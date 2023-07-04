<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\DomainImages;
use App\Models\Unit;
use App\Models\Server;
use App\Models\User;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Exports\DomainsDataExport;


class DomainController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $domains = Domain::query()
        ->join('servers', 'domains.server_id', '=', 'servers.id')
        ->select('domains.*', 'servers.name as server_name');

        // if(auth()->user()->is_admin != 1){
        //     $unitId = Server::find($domains->server_id)->unit->id;
        //     $domains = $domains->where($unitId, auth()->user()->unit_id);
        // } 
        
        if (auth()->user()->is_admin != 1) {
            $domains = $domains->where('servers.unit_id', auth()->user()->unit_id);
        }

        if($search){
            $domains = $domains->where('domains.id', 'like', "%$search%")
                ->orWhere('domains.name', 'like', "%$search%")
                ->orWhere('domains.description', 'like', "%$search%")
                ->orWhere('domains.url', 'like', "%$search%")
                ->orWhere('domains.application_type', 'like', "%$search%")
                ->orWhere('domains.port', 'like', "%$search%")
                ->orWhere('servers.name', 'like', "%$search%")
                ->orWhere('domains.http_status', 'like', "%$search%");
        }

        $domains = $domains->paginate(8);

        return view('dashboard.domains.index', compact('domains'));
    }

    public function show(Domain $domain): View
    {
        $domainImages = DomainImages::where('domain_id', $domain->id)->first();

        return view('dashboard.domains.show', compact('domain', 'domainImages'));
    }

    public function store(): RedirectResponse
    {
        // assign http status using function
        $http_status = $this->checkHttpStatus(request('url'));

        $unit_id = Server::query()->where('id', request('server_id'))->value('unit_id');
        $higher_domain = Unit::query()->where('id', $unit_id)->value('higher_domain');

        // validate request
        $attributes = request()->validate([
            'url' => ['required', 'regex:/^.*' . preg_quote($higher_domain, '/') . '\/?$/'],
            'name' => 'required',
            'description' => 'required',
            'application_type' => 'required',
            'port' => 'required|numeric|min:1',
            'server_id' => 'required',
            'user_id' => 'required',
            'images' => 'nullable|image', // Include 'images' validation rule here
        ]);

        $domain = Domain::create([
            'url' => $attributes['url'],
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'application_type' => $attributes['application_type'],
            'port' => $attributes['port'],
            'server_id' => $attributes['server_id'],
            'user_id' => $attributes['user_id'],
            'http_status' => $http_status,
        ]);

        $domainId = $domain->id;

        // check if image is empty
        if (request()->hasFile('images')) {
            $images_upload['images'] = request('images')->store('domain_images');
        } else {
            $defaultImage = public_path('img/default-image.png');
            $extension = pathinfo($defaultImage, PATHINFO_EXTENSION);
            $randomString = \Illuminate\Support\Str::random(40);
            $filename = $randomString . '.' . $extension;
            $defaultImagePath = 'domain_images/' . $filename;

            // Check if the default image already exists in the storage
            if (!Storage::exists($defaultImagePath)) {
                Storage::put($defaultImagePath, file_get_contents($defaultImage));
            }

            $images_upload['images'] = $defaultImagePath;
        }

        DomainImages::create([
            'domain_id' => $domainId,
            'images' => $images_upload['images'],
        ]);

        return redirect(route('domains'))->with('success', 'Domain berhasil ditambahkan');
    }

    // function to check http status
    public function checkHttpStatus($url)
    {
        try {
            $response = Http::connectTimeout(2)->get($url, [
                RequestOptions::ALLOW_REDIRECTS => false,
            ]);
            if ($response->ok()) {
                return 'Active';
            }
        } catch (\Exception $e) {
            return 'No Active';
        }
        return 'No Active';
    }

    public function create(): View
    {
        return view('dashboard.domains.create');
    }

    public function edit(Domain $domain): View
    {
        return view('dashboard.domains.edit', compact('domain'));
    }

    public function update(Domain $domain): RedirectResponse
    {
        // get old image
        $oldImage = DomainImages::where('domain_id', $domain->id)->first();
        $imagePath = $oldImage->images;

        $unit_id = Server::query()->where('id', request('server_id'))->value('unit_id');
        $higher_domain = Unit::query()->where('id', $unit_id)->value('higher_domain');

        // assign http status using function
        $http_status = $this->checkHttpStatus(request('url'));

        // validate request
        $attributes = request()->validate([
            'url' => ['required', 'regex:/^.*' . preg_quote($higher_domain, '/') . '\/?$/'],
            'name' => 'required',
            'description' => 'required',
            'application_type' => 'required',
            'port' => 'required|numeric|min:1',
            'server_id' => 'required',
            'user_id' => 'required'
        ]);

        $domain->update([
            'url' => $attributes['url'],
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'application_type' => $attributes['application_type'],
            'port' => $attributes['port'],
            'server_id' => $attributes['server_id'],
            'http_status' => $http_status,
            'user_id' => $attributes['user_id']
        ]);

        $domainId = $domain->id;

        // if upload image is empty, using old image on update image
        if (request('images') != null) {
            $images_upload = request()->validate([
                'images' => 'required|image',
            ]);

            // upload image
            $images_upload['images'] = request('images')->store('domain_images');
            DomainImages::create([
                'domain_id' => $domainId,
                'images' => $images_upload['images'],
            ]);

            if ($imagePath) {
                Storage::delete($imagePath);
            }
            // delete old image
            $oldImage->delete();
        }

        return redirect(route('domains'))->with('success', 'Domain updated successfully');
    }

    public function destroy(Domain $domain): RedirectResponse
    {
        if($domain->notifications()->exists()) {
            return redirect(route('domains'))->with('error', 'Domain cannot be deleted because it has notifications');
        }
        // get old image
        $oldImage = DomainImages::where('domain_id', $domain->id)->first();

        $imagePath = $oldImage->images;

        // delete old image
        $oldImage->delete();
        if ($imagePath) {
            Storage::delete($imagePath);
        }

        $domain->delete();

        return redirect(route('domains'))->with('success', 'Domain deleted successfully');
    }

    public function exportExcel(): BinaryFileResponse
    {
        return Excel::download(new DomainsDataExport, 'domains.xlsx');
    }
}
