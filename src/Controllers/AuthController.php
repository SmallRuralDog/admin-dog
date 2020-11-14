<?php


namespace SmallRuralDog\AdminDog\Controllers;


use SmallRuralDog\AdminDog\Components\Element;
use SmallRuralDog\AdminDog\Components\VAvatar\VAvatar;
use SmallRuralDog\AdminDog\Components\VBtn\VBtn;
use SmallRuralDog\AdminDog\Components\VCheckbox\VCheckbox;
use SmallRuralDog\AdminDog\Components\VChip\VChip;
use SmallRuralDog\AdminDog\Components\VForm\VForm;
use SmallRuralDog\AdminDog\Components\VGrid\VCard;
use SmallRuralDog\AdminDog\Components\VGrid\VCol;
use SmallRuralDog\AdminDog\Components\VGrid\VContainer;
use SmallRuralDog\AdminDog\Components\VGrid\VRow;
use SmallRuralDog\AdminDog\Components\VIcon\VIcon;
use SmallRuralDog\AdminDog\Components\VTextField\VTextField;

class AuthController extends AdminDogController
{


    public function login()
    {
        $container = VContainer::make()->class('fill-height justify-center');
        $container->slot(function () {
            return VRow::make()->prop('justify', 'center')->slot(function () {
                return VCol::make()->prop('lg', '11')->prop('sm', '8')->prop('xl', '7')->slot(function () {
                    return VCard::make()->class('elevation-4')->slot(function () {
                        return VRow::make()
                            ->slot(function () {
                                return VCol::make()->prop('lg', '7')->class('info d-none d-md-flex align-center justify-center')->slot(function () {
                                    return Element::make('div')->class('d-none d-sm-block')->slot(function () {
                                        return Element::make('div')->class('d-flex align-center pa-10')->slot(function () {
                                            return Element::make('div')->slot(function () {
                                                return Element::make('h2')->class('display-1 white--text font-weight-medium')->slot("Elegant Design with unlimited features, built with love");
                                            })->slot(function () {
                                                return Element::make('h6')->class('subtitle-1 mt-4 white--text op-5 font-weight-regular')->slot("Wrappixel helps developers to build organized and well-coded admin dashboards full of beautiful and feature rich modules.");
                                            })->slot(function () {
                                                return VBtn::make()->slot("Learn More")->onClick('test(_this)')->class('mt-4 text-capitalize')->prop('x-large', true)->prop('outlined', true)->prop('color', 'white');
                                            });
                                        });
                                    });
                                });
                            })->slot(function () {
                                return VCol::make()->prop('lg', 5)->slot(function () {
                                    return Element::make('div')->class('pa-7 pa-sm-12')
                                        ->slot(function () {
                                            return Element::make('img')->prop('src', 'https://js-app.oss-cn-hongkong.aliyuncs.com/logo-icon.png');
                                        })
                                        ->slot(Element::make('h2')->slot('Sign in')->class('font-weight-bold mt-4 blue-grey--text text--darken-2'))
                                        ->slot(Element::make('h6')->slot('Don\'t have an account? <a href="/auth/register" class="ml-2">Sign Up</a>')->class('subtitle-1'))
                                        ->slot(
                                            VForm::make()->prop('ref', 'form')->prop('lazy-validation', true)
                                                ->slot(function () {
                                                    return VTextField::make()->prop('label', 'E-mail')->class('mt-4')->prop('required')->prop('outlined')->prop('v-model', 'email');
                                                })->slot(function () {
                                                    return VTextField::make()
                                                        ->prop('label', 'Password')->prop('required')->prop('outlined')
                                                        ->prop('v-model', 'password')->prop('append-icon', 'mdi-eye-off')
                                                        ->prop('counter', 10)->prop('type', 'password');
                                                })->slot(function () {
                                                    return Element::make('div')->class('d-block d-sm-flex align-center mb-4 mb-sm-0')
                                                        ->slot(function () {
                                                            return VCheckbox::make()->prop('label', 'Remember me?')->prop('required');
                                                        })->slot(Element::make('div')->class('ml-auto')->slot('<a href="javascript:void(0)" class="link">Forgot pwd?</a>'));
                                                })->slot(VBtn::make()->slot("Sign In")->class('mr-4')->prop('submit')->prop('block')->prop('color', 'info'))
                                        )->slot(function (){
                                            return Element::make('div')->class('text-center mt-6')
                                                ->slot(VChip::make()->prop('pill')->class('mr-2')->slot(VAvatar::make()->prop('left')->slot(VBtn::make()->prop('color','blue lighten-1')->class('white--text')->slot(VIcon::make()->slot('mdi-twitter'))))->slot(Element::make('span')->slot('Twitter')))
                                                ->slot(VChip::make()->prop('pill')->slot(VAvatar::make()->prop('left')->slot(VBtn::make()->prop('color','teal lighten-1')->class('white--text')->slot(VIcon::make()->slot('mdi-github'))))->slot(Element::make('span')->slot('Github')));
                                        });
                                });
                            });
                    });
                });
            });
        });


        return $container;
    }

}
