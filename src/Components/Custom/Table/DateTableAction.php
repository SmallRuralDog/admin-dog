<?php


namespace SmallRuralDog\AdminDog\Components\Custom\Table;


use SmallRuralDog\AdminDog\Components\Element;
use SmallRuralDog\AdminDog\Components\VIcon\VIcon;
use SmallRuralDog\AdminDog\Events\ClickEvent;

trait DateTableAction
{


    public function itemActions()
    {

    }


    private function initItemActions()
    {

        $actionElement = Element::make('div');

        $actionElement
            ->slot(
                VIcon::make()
                    ->slot('mdi-pencil')
                    ->prop('size', 'small')
                    ->onClick(function (ClickEvent $clickEvent) {
                        $clickEvent->jsCode('_this.$toast("Edit")');
                    })
            );

        $actionElement
            ->slot(
                VIcon::make()
                    ->slot('mdi-delete')
                    ->class('ml-2')
                    ->prop('size', 'small')
                    ->onClick(function (ClickEvent $clickEvent) {
                        $clickEvent->jsCode('console.log(_this.$attrs.slotValue.item)');
                    })
            );


        $this->slot($actionElement, 'item.actions');


        $this->header(DataTableHeader::make('Actions', 'actions')->sortable(false));

    }


    public function topSlot()
    {

    }


    private function initSlot()
    {
        $this->initItemActions();
    }

}
