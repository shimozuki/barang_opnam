<?php

namespace App\Exports;
use Illuminate\Support\Carbon;
use App\Models\Barangkeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class BarangkeluarExport implements FromCollection, WithMapping , WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barangkeluar::with('barang')->get();
    }
    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {


            $event->sheet->getDelegate()->getStyle('A1:A2')
                                ->getFont()
                                ->setBold(true);

            $event->sheet->getDelegate()->getStyle('A4:I4')
                                ->getFont()
                                ->setBold(true);
            // $event->sheet->setCellValue('G'. ($event->sheet->getHighestRow()+1), '=SUM(G3:G'.$event->sheet->getHighestRow().')');
            $event->sheet->setCellValue('I'. ($event->sheet->getHighestRow()+1), '=SUM(I2:I'.$event->sheet->getHighestRow().')');

        }
    ];
}
    public function map($regis) : array {

        return [

            $regis->id,
        $regis->barang->user->name,
        $regis->barang->name,
        $regis->tujuan,
        $regis->barang->tahun,
        $regis->barang->harga,
        $regis->jml,
        $regis->barang->jumlah,
        $regis->barang->stock,




        ] ;
    }
    public function headings() : array {

        return[
            ['BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH KOTA JAMBI'],
            ['LAPORAN DATA BARANG KELUAR'],
            [''],



            ['NO',
            'NAMA BIDANG',
            'NAMA BARANG',
            'TUJUAN',
             'TAHUN PEMBELIAN',
            'HARGA BARANG',
            'BARANG KELUAR',
            'JUMLAH BARANG',
             'PAGU'
             ]

        ];

    }
}
