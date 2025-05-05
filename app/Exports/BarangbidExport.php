<?php

namespace App\Exports;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangbidExport implements FromCollection, WithMapping , WithHeadings, WithEvents

{

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
            $event->sheet->setCellValue('H'. ($event->sheet->getHighestRow()+1), '=SUM(H2:H'.$event->sheet->getHighestRow().')');
        }
    ];
}
    public function collection()
    {
        return Barang::where('user_id', Auth::user()->id)->with('user','satuan','kategori')->get();
    }
    public function map($registration) : array {

        return [

            $registration->id,
            $registration->user->name,
            $registration->satuan->name,
            $registration->kategori->name,
            $registration->name,
            $registration->tahun,
            $registration->harga,
            $registration->jumlah,
            $registration->stock,


        ] ;
    }
        public function headings() : array {

            return
            [
                ['BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH KOTA JAMBI'],
                ['LAPORAN DATA BARANG'],
                [''],




                ['NO',
           'NAMA BIDANG',
           'SATUAN',
           'KATEGORI',
           'NAMA BARANG',
           'TAHUN PEMBELIAN',
           'HARGA BARANG',

           'JUMLAH BARANG',
            'PAGU',
            ]
            ];


        }
    }

    // public function collection()
    // {
    //     return Barang::select('id','user->name','kategori','satuan','barang','harga','stock')->get();
    // }
    // public function headings():array{

    //     return["id","bidang","kategori","satuan","barang","harga","stock"];
    // }

