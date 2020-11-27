<?php


namespace SmallRuralDog\AdminDog\Controllers;


use SmallRuralDog\AdminDog\Components\Element;
use SmallRuralDog\AdminDog\Components\VBtn\VBtn;
use SmallRuralDog\AdminDog\Components\VCard\VCardActions;
use SmallRuralDog\AdminDog\Components\VCard\VCardSubtitle;
use SmallRuralDog\AdminDog\Components\VCard\VCardText;
use SmallRuralDog\AdminDog\Components\VDataTable\VDataTable;
use SmallRuralDog\AdminDog\Components\VDataTable\VEditDialog;
use SmallRuralDog\AdminDog\Components\VDialog\VDialog;
use SmallRuralDog\AdminDog\Components\VDivider\VDivider;
use SmallRuralDog\AdminDog\Components\VGrid\VCard;
use SmallRuralDog\AdminDog\Components\VGrid\VCol;
use SmallRuralDog\AdminDog\Components\VGrid\VContainer;
use SmallRuralDog\AdminDog\Components\VGrid\VRow;
use SmallRuralDog\AdminDog\Components\VGrid\VSpacer;
use SmallRuralDog\AdminDog\Components\VTextField\VTextField;
use SmallRuralDog\AdminDog\Components\VToolbar\VToolbar;
use SmallRuralDog\AdminDog\Components\VToolbar\VToolbarTitle;
use SmallRuralDog\AdminDog\Events\ChangeEvent;
use SmallRuralDog\AdminDog\Events\ClickEvent;
use SmallRuralDog\AdminDog\Events\EventListener;
use SmallRuralDog\AdminDog\Models\AdminDogUser;

class UserController extends AdminDogController
{
    public function index()
    {
        return VDataTable::make()
            ->prop('headers', [
                ['text' => 'ID', 'value' => 'id'],
                ['text' => 'Email', 'value' => 'email'],
                ['text' => 'Name', 'value' => 'name'],
                ['text' => 'created_at', 'value' => 'created_at'],
            ])
            ->prop('loading', false)
            ->prop('items', AdminDogUser::query()->get()->toArray())
            ->slot(VToolbar::make()
                ->class('elevation-0')
                ->prop('flat')
                ->slot(VToolbarTitle::make()->slot('My CRUD'))
                ->slot(VDivider::make()->prop('inset')->prop('vertical')->class('mx-4'))
                ->slot(VSpacer::make())
                ->slot(VDialog::make()
                    ->addEventListener(function (EventListener $eventListener) {
                        $eventListener->listener('x-close');
                        $js = <<<JS
_this.value = false
JS;

                        $eventListener->listenerCode($js);
                    })
                    ->prop('max-width', '500px')
                    ->slot(VBtn::make()
                        ->prop('color', 'primary')
                        ->prop('dark')
                        ->slot('New Item')
                        ->onClick(function (ClickEvent $clickEvent) {
                            $clickEvent->jsCode("{{_this.\$attrs.slotValue.on.click}}");
                        }), 'activator')
                    ->slot(VCard::make()
                        ->slot(VCardSubtitle::make()->slot(Element::make('span')->slot('Title')))
                        ->slot(VCardText::make()->slot(VContainer::make()
                            ->slot(VRow::make()
                                ->slot(VCol::make()->prop('cols', 12)->prop('sm', 6)->prop('md', 6)
                                    ->slot(VTextField::make()->prop('label', 'Email')->onChange(function (ChangeEvent $changeEvent){
                                        $changeEvent->jsCode("console.log(_this.value)");
                                    })))
                                ->slot(VCol::make()->prop('cols', 12)->prop('sm', 6)->prop('md', 6)->slot(VTextField::make()->prop('label', 'Name')))
                                ->slot(VCol::make()->prop('cols', 12)->prop('sm', 6)->prop('md', 6)->slot(VTextField::make()->prop('label', 'Password')))
                                ->slot(VCol::make()->prop('cols', 12)->prop('sm', 6)->prop('md', 6)->slot(VTextField::make()->prop('label', 'Password')))
                                ->slot(VCol::make()->prop('cols', 12)->prop('sm', 12)->prop('md', 12)->slot(VTextField::make()->prop('label', 'Protein (g)')))
                            )
                        ))
                        ->slot(VCardActions::make()
                            ->slot(VSpacer::make())
                            ->slot(VBtn::make()->slot('Cancel')->prop('text')->prop('color', 'blue darken-1')->onClick(function (ClickEvent $clickEvent) {
                                $clickEvent->emit('x-close');
                            }))
                            ->slot(VBtn::make()->slot('save')->prop('text')->prop('color', 'blue darken-1'))
                        )
                    )
                )
                , 'top')
            ->slot(VEditDialog::make()->slot('{{_this.$attrs.slotValue.item.name}}')->slot(VTextField::make()->vModel('item.name'), 'input'), 'item.name');
    }

}
