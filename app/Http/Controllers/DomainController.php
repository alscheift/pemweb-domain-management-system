<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\DomainImages;
use App\Models\Unit;
use App\Models\User;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class DomainController extends Controller
{
    public function index(): View
    {
        $domains = [];

        if (auth()->user()->can('admin')) {
            $domains = Domain::all()->paginate(10);
        } else if (auth()->user()->can('pic')) {
            $domains = auth()->user()->unit->domains()->paginate(10);
        }

        return view('dashboard.domains.index', compact('domains'));
    }

    public function store(): RedirectResponse
    {
        // assign http status using function
        $http_status = $this->checkHttpStatus(request('url'));

        // validate request
        $attributes = request()->validate([
            'url' => 'required',
            'name' => 'required',
            'description' => 'required',
            'application_type' => 'required',
            'port' => 'required',
            'server_id' => 'required',
            'user_id' => 'required',
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

        $images_upload = request()->validate([
            'images' => 'required|image',
        ]);

        // upload image
        $images_upload['images'] = request('images')->store('domain_images');
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
            $response = Http::connectTimeout(1)->get($url, [
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

        // assign http status using function
        $http_status = $this->checkHttpStatus(request('url'));

        // validate request
        $attributes = request()->validate([
            'url' => 'required',
            'name' => 'required',
            'description' => 'required',
            'application_type' => 'required',
            'port' => 'required',
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
}
