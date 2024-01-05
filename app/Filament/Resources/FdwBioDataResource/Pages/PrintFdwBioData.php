<?php

namespace App\Filament\Resources\FdwBioDataResource\Pages;

use App\Filament\Resources\FdwBioDataResource;
use App\Models\FdwBioData;
use App\Models\FdwBioDataLog;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Model;

class PrintFdwBioData extends Page
{
    public $record;

    protected static string $resource = FdwBioDataResource::class;

    protected static string $view = 'filament.resources.fdw-bio-data-resource.pages.print-fdw-bio-data';

    protected static ?string $title = 'MDW Bio Data Details';

    protected static ?string $breadcrumb = 'MDW Bio Data Details';
    public function mount($record)
    {
        abort_unless(auth()->user()->can('print_fdw::bio::data'), 403);

        $this->record = FdwBioData::find($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('publish')
                ->button()
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->url(function (){
                    $model = $this->record->update([
                        'status' => 'published',
                    ]);
                    if ($model){
                        return route('filament.admin.resources.fdw-bio-datas.index');
                    }
                })
                ->visible(function(){
                    if($this->record->status === 'pending' ){
                        return true;
                    };
                    return false;
                })
                ->hidden(!auth()->user()->can('publish_fdw::bio::data',$this->record)),
            Action::make('edit')
            ->url(route('filament.admin.resources.fdw-bio-datas.edit', $this->record->id))
            ->color('info')
            ->icon('heroicon-o-pencil-square'),
            Action::make('print')
                ->button()
                ->icon('heroicon-o-printer')
                ->action(function () {
                    self::js(<<<'JS'
                        let myWindow = window.open('', 'PRINT', 'height=600,width=800');
                        myWindow.document.write('<!doctype html>');
                        myWindow.document.write('<html><head><title>' + document.title  + '</title>');
                        myWindow.document.write('<meta charset="UTF-8">');
                        myWindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
                        myWindow.document.write('<script src="https://cdn.tailwindcss.com"></script>');
                        myWindow.document.write('</head><body>');
                        myWindow.document.write(document.getElementById('printArea').innerHTML);
                        myWindow.document.write('<script type="text/javascript">setTimeout(function() {window.print(); window.close();}, 2000);</script>');
                        myWindow.document.write('</body></html>');
                        myWindow.document.close();
                        myWindow.focus();

                        // myWindow.print();
                        // myWindow.close();
                        return true;
                    JS);
                }),
            Action::make('delete')
                ->button()
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->action(function (){
                    FdwBioDataLog::where('fdw_record_id', $this->record->id)->delete();
                    $this->record->forceDelete();
                    return redirect(self::getResource()::getUrl('index'));
                })
                ->visible(function(){
                    if($this->record->status === 'pending' ){
                        return true;
                    };
                    return false;
                }),
            Action::make('back')
                ->icon('heroicon-o-arrow-left')
                ->button()
                ->color('gray')
                ->url(self::getResource()::getUrl('index'))
                ->visible(function(){
                    if($this->record->status !== 'pending' ){
                        return true;
                    };
                    return false;
                }),
        ];
    }

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }
}
