const BaseComponent = {
    props: ['fields'],
    data() {
        return {
            value: null,
            vif: true,//组件v-if
            eventData: null,//事件数据
            requesting: false,//组件是否请求中
            response: null,//组件请求成功相应
            error: null,//组件请求失败响应

        }
    },
    mounted() {
        /**
         * 注册组件监听事件
         * Register component listening events
         */
        if (this.attrs.listener && this.attrs.listener.length > 0) {
            this.attrs.listener.map(item => {
                if (item.listener && item.listenerCode) {
                    this.$bus.on(item.listener, (emit) => {
                        new Function('_this', '_emit', item.listenerCode)(this, emit)
                    })
                }
            });
        }
    },
    destroyed() {
        /**
         * 移除组件监听事件
         * Removes component listening events
         */
        if (this.attrs.listener && this.attrs.listener.length > 0) {
            this.attrs.listener.map(item => {
                if (item.listener && item.listenerCode) {
                    this.$bus.off(item.listener)
                }
            });
        }
    },
    methods: {
        //触发事件
        baseEvent(name, eventData = null) {
            if (this.attrs.events && this.attrs.events[name]) {
                this.eventData = eventData;
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events[name].emits && this.attrs.events[name].emits.length > 0 && this.attrs.events[name].emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events[name].jsCode && new Function('_this', this.attrs.events[name].jsCode)(this)
            }
        },
    },
    created() {
        /**
         * 表单验证规则处理
         * Form validation rule processing
         */
        if (this.attrs.rules && this.attrs.rules.length > 0) {
            this.attrs.props.rules = this.attrs.rules.map(rule => {
                return v => eval(rule);
            });
        }
        if (this._.hasIn(this.attrs, 'value')) {
            this.value = this.attrs.value;
        }

    },
    computed: {
        props() {
            let _this = this;
            return this._.mapValues(this.attrs.props, item => {
                if (typeof (item) === 'string' && this._.endsWith(item, "}") && this._.startsWith(item, "{")) {
                    let code = _this._.replace(item, '{{', '')
                    code = _this._.replace(code, '}}', '')
                    return eval(code)
                }
                return item;
            })
        },
        events() {
            let _this = this;
            let events = this._.mapValues(this.attrs.events, item => {
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                if (item.jsCode) {

                    //执行父级事件，需要用 {{ **** }}
                    if (this._.endsWith(item.jsCode, "}") && this._.startsWith(item.jsCode, "{")) {
                        let code = _this._.replace(item.jsCode, '{{', '')
                        code = _this._.replace(code, '}}', '')
                        return eval(code)
                    }
                    //执行自定义事件
                    return () => {
                        eval(item.jsCode)
                    }
                }
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                if (item.emits && item.emits.length > 0) {
                    return () => {
                        item.emits.map(emit => {
                            this.$bus.emit(emit, this);
                        })
                    };
                }
            }) || {}
            return events;
        }
    }
}
export {
    BaseComponent
}
