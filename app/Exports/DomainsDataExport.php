<?php

namespace App\Exports;

use App\Models\Domain;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet;

class DomainsDataExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $domains;

    public function __construct()
    {
        $user = auth()->user();
        $domains = Domain::query()
        ->join('servers', 'domains.server_id', '=', 'servers.id')
        ->select('domains.*', 'servers.name as server_name');
        
        if ($user->is_admin == 1) {
            $this->domains = Domain::all();
        } else {
            $this->domains = $domains->where('servers.unit_id', $user->unit_id)->get();
        }
    }


    public function view(): View
    {
        return view('dashboard.domains.export-excel', [
            'domains' => $this->domains
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Url',
            'Application Type',
            'Port',
            'HTTP Status',
            'Server',
            'Unit',
        ];
    }

    public function title(): string
    {
        return 'Domains Report'; // Replace with your desired title
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]], // Apply bold font to the first row (title)
            'A1:I1' => ['borders' => ['outline' => Border::BORDER_THIN]], // Apply border to the title row
            'A2:I' . ($this->domains->count() + 1) => ['borders' => ['outline' => Border::BORDER_THIN]], // Apply border to the data rows
        ];
    }
}
