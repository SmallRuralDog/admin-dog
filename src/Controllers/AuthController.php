<?php


namespace SmallRuralDog\AdminDog\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
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
use SmallRuralDog\AdminDog\Events\CatchEvent;
use SmallRuralDog\AdminDog\Events\ChangeEvent;
use SmallRuralDog\AdminDog\Events\ClickEvent;
use SmallRuralDog\AdminDog\Events\EventListener;
use SmallRuralDog\AdminDog\Events\FinallyEvent;
use SmallRuralDog\AdminDog\Events\RequestingEvent;

class AuthController extends AdminDogController
{

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        return \AdminDog::fullPath("/auth/login");
    }

    public function login()
    {

        if ($this->guard()->check()) {
            return \AdminDog::fullPath("/");
        }


        $container = VContainer::make()->class('fill-height justify-center');
        $container->slot(function () {
            return VRow::make()->prop('justify', 'center')->slot(function () {
                return VCol::make()->prop('lg', '11')->prop('sm', '8')->prop('xl', '7')->slot(function () {
                    return VCard::make()
                        ->class('elevation-4')
                        ->slot(function () {
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
                                                    return VBtn::make()->slot("Learn More")->onClick(function (ClickEvent $clickEvent) {
                                                        $js = <<<JS
window.open('https://github.com/agent-chaung/admin-dog')
JS;
                                                        $clickEvent->jsCode($js);
                                                    })->class('mt-4 text-capitalize')->prop('x-large')->prop('outlined')->prop('color', 'white');
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
                                            ->slot(Element::make('h2')
                                                ->slot('Sign in')
                                                ->class('font-weight-bold mt-4 blue-grey--text text--darken-2')
                                            )
                                            ->slot(Element::make('h6')
                                                ->slot('Don\'t have an account?')
                                                ->class('subtitle-1')
                                            )
                                            ->slot(
                                                VForm::make()
                                                    ->fields(['email' => '296404875@qq.com', 'password' => '123456', 'remember' => true])
                                                    ->action(route('admin-dog.login-post'))
                                                    ->addEventListener(function (EventListener $eventListener) {
                                                        $eventListener->listener("submit");
                                                        $js = <<<JS
_this.submit();
JS;
                                                        $eventListener->listenerCode($js);

                                                    })
                                                    ->onCatch(function (CatchEvent $catchEvent) {
                                                        $js = <<<JS
_this.\$toast.error(_this.error.message)
JS;
                                                        $catchEvent->jsCode($js);
                                                    })
                                                    ->onRequesting(function (RequestingEvent $requestingEvent) {
                                                        $requestingEvent->emit('loginLoading');
                                                    })->onFinally(function (FinallyEvent $finallyEvent) {
                                                        $finallyEvent->emit('loginNoLoading');
                                                    })
                                                    ->prop('lazy-validation')
                                                    ->attr('loading', false)
                                                    ->slot(function () {
                                                        return VTextField::make()
                                                            ->vModel('email')
                                                            ->class('mt-4')
                                                            ->rule("!!v || 'Name is required'")
                                                            ->rule('/.+@.+\..+/.test(v) || "E-mail must be valid"')
                                                            ->prop('label', 'E-mail')
                                                            ->prop('required')
                                                            ->prop('clearable')
                                                            ->prop('outlined');
                                                    })->slot(function () {
                                                        return VTextField::make()
                                                            ->vModel('password')
                                                            ->rules(['!!v || "Password is required"', '(v && v.length <= 10) || "Password must be less than 10 characters"'])
                                                            ->prop('label', 'Password')
                                                            ->prop('required')
                                                            ->prop('outlined')
                                                            ->prop('append-icon', 'mdi-eye-off')
                                                            ->prop('counter', 10)
                                                            ->prop('type', 'password');
                                                    })
                                                    ->slot(function () {
                                                        return Element::make('div')
                                                            ->class('d-block d-sm-flex align-center mb-4 mb-sm-0')
                                                            ->slot(function () {
                                                                return VCheckbox::make()->vModel('remember')->prop('label', 'Remember me?')->prop('required')->onChange(function (ChangeEvent $changeEvent) {

                                                                    $changeEvent->emit('xxx');
                                                                });
                                                            })
                                                            ->slot(Element::make('div')
                                                                ->class('ml-auto')
                                                                ->slot(Element::make('a')->slot('Forgot pwd?')->class('link'))
                                                            );
                                                    })->slot(VBtn::make()
                                                        ->slot("Sign In")
                                                        ->class('mr-4')
                                                        ->prop('block')
                                                        ->prop('color','primary')
                                                        ->prop('loading', false)
                                                        ->addEventListener(function (EventListener $eventListener) {
                                                            $eventListener->listener("loginLoading");
                                                            $eventListener->listenerCode("_this.attrs.props.loading=true");
                                                        })
                                                        ->addEventListener(function (EventListener $eventListener) {
                                                            $eventListener->listener("loginNoLoading");
                                                            $eventListener->listenerCode("_this.attrs.props.loading=false");
                                                        })
                                                        ->onClick(function (ClickEvent $clickEvent) {
                                                            $clickEvent->emit('submit');
                                                        }))
                                            )->slot(function () {
                                                return Element::make('div')
                                                    ->class('text-center mt-6')
                                                    ->slot(VChip::make()->prop('pill')->class('mr-2')->slot(VAvatar::make()->prop('left')->slot(VBtn::make()->prop('color', 'blue lighten-1')->class('white--text')->slot(VIcon::make()->slot('mdi-twitter'))))->slot(Element::make('span')->slot('Twitter')))
                                                    ->slot(VChip::make()->prop('pill')->slot(VAvatar::make()->prop('left')->slot(VBtn::make()->prop('color', 'teal lighten-1')->class('white--text')->slot(VIcon::make()->slot('mdi-github'))))->slot(Element::make('span')->slot('Github')));
                                            });
                                    });
                                });
                        });
                });
            });
        });


        return $container;
    }


    public function loginPost(Request $request)
    {
        try {
            $this->validatorData($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            $remember = $request->get('remember', false);
            if ($this->guard()->attempt($credentials, $remember)) {
                return \AdminDog::vueRouterTo('/');
            }
            return $this->responseError($this->getFailedLoginMessage());
        } catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }


    }


    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    protected function username()
    {
        return 'username';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return \AdminDog::guard();
    }

}
