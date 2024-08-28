<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelExportContact implements FromView, WithStyles
{

    protected $data;
    protected $view;
    protected $headings;
    protected $types;
    public function __construct($types, $data, $view, $headings)
    {
        $this->data = $data;
        $this->view = $view;
        $this->types = $types;
        $this->headings = $headings;
    }

    // public function array(): array
    // {
    //     return $this->data;
    // }
    public function view(): View
    {
        $headings = $this->headings;
        $contacts = $this->data;
        return view($this->view, compact('headings', 'contacts'));
    }

    // public function collection()
    // {
    //     //
    //     return $this->data;
    // }
    // add title for file export
    // public function headings(): array
    // {
    //     return $this->headings;
    // }
    public function styles(Worksheet $sheet)
    {
        switch ($this->types) {
            case 'contact':
                $sheet->getColumnDimension('A')->setWidth(10);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(25);
                $sheet->getColumnDimension('D')->setWidth(15);
                $sheet->getColumnDimension('E')->setWidth(40);
                $sheet->getColumnDimension('F')->setWidth(10);
                break;
            case 'transaction':
                $sheet->getColumnDimension('A')->setWidth(10);
                $sheet->getColumnDimension('B')->setWidth(15);
                $sheet->getColumnDimension('C')->setWidth(20);
                $sheet->getColumnDimension('D')->setWidth(20);
                $sheet->getColumnDimension('E')->setWidth(30);
                $sheet->getColumnDimension('F')->setWidth(20);
                $sheet->getColumnDimension('G')->setWidth(30);
                $sheet->getColumnDimension('H')->setWidth(20);
                $sheet->getColumnDimension('I')->setWidth(20);
                $sheet->getColumnDimension('J')->setWidth(20);
                $sheet->getColumnDimension('K')->setWidth(20);
                break;
        }
    }
}
