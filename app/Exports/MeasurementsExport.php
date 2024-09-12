<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class MeasurementsExport implements FromArray, WithHeadings, WithStyles, WithTitle
{
    protected $measurement;

    public function __construct($measurement)
    {
        $this->measurement = $measurement;
    }

    public function array(): array
    {
        $data = [];

       
        $details = $this->measurement->details;

        if (is_string($details)) {
            $details = json_decode($details, true);
        }

     
        $data[] = [
            'Client Name: ' . ($this->measurement->client_name ?? ''),
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];

    
        $data[] = [
            '#',
            'Room/Window',
            'Fabric Name',
            'Cassette Type',
            'Width',
            'Height',
            'Blind Type',
            'Mount Type',
            'Notes',
        ];


        if (is_array($details)) {
            foreach ($details as $index => $detail) {
                $data[] = [
                    $index + 1,
                    $detail['room_name'] ?? '',
                    $detail['fabric_name'] ?? '',
                    $detail['cassette_type'] ?? '',
                    $detail['top_width'] ?? '',
                    $detail['left_height'] ?? '',
                    $detail['blind_type'] ?? '',
                    isset($detail['mount_type']) ? ($detail['mount_type'] == 'inside' ? 'Inside Mount' : 'Outside Mount') : '',
                    $detail['notes'] ?? '',
                ];
            }
        } else {
           
            $data[] = ['Error: Details data is not an array'];
        }

        return $data;
    }

    public function headings(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
      
        $sheet->getStyle('A1:K1')->getFont()->setBold(true);
        $sheet->getStyle('A1:K1')->getAlignment()->setHorizontal('left');

     
        $sheet->getStyle('A2:K2')->getFont()->setBold(true);
        $sheet->getStyle('A2:K2')->getAlignment()->setHorizontal('center');


        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(25);
     

        return [
          
        ];
    }

    public function title(): string
    {
        return 'Measurement Data';
    }
}
