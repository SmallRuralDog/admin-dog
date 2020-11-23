const BaseComponent = {
    data() {
        return {
            vif: true,//组件v-if
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
        baseClick() {
            if (this.attrs.events && this.attrs.events.click) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.click.emits && this.attrs.events.click.emits.length > 0 && this.attrs.events.click.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.click.jsCode && new Function('_this', this.attrs.events.click.jsCode)(this)

            }
        },
        baseChange() {
            if (this.attrs.events && this.attrs.events.change) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.change.emits && this.attrs.events.change.emits.length > 0 && this.attrs.events.change.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.change.jsCode && new Function('_this', this.attrs.events.change.jsCode)(this)
            }
        },
        baseRequesting() {
            if (this.attrs.events && this.attrs.events.requesting) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.requesting.emits && this.attrs.events.requesting.emits.length > 0 && this.attrs.events.requesting.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.requesting.jsCode && new Function('_this', this.attrs.events.requesting.jsCode)(this)
            }
        },
        baseThen() {
            if (this.attrs.events && this.attrs.events.then) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.then.emits && this.attrs.events.then.emits.length > 0 && this.attrs.events.then.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.then.jsCode && new Function('_this', this.attrs.events.then.jsCode)(this)
            }
        },
        baseCatch() {
            if (this.attrs.events && this.attrs.events.catch) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.catch.emits && this.attrs.events.catch.emits.length > 0 && this.attrs.events.catch.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.catch.jsCode && new Function('_this', this.attrs.events.catch.jsCode)(this)
            }
        },
        baseFinally() {
            if (this.attrs.events && this.attrs.events.finally) {
                /**
                 * 如果是触发事件
                 * If it's a triggering event
                 */
                this.attrs.events.finally.emits && this.attrs.events.finally.emits.length > 0 && this.attrs.events.finally.emits.map(emit => {
                    this.$bus.emit(emit, this);
                });
                /**
                 * 如果是执行代码
                 * If you're executing code
                 */
                this.attrs.events.finally.jsCode && new Function('_this', this.attrs.events.finally.jsCode)(this)
            }
        }
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
    }
}
export {
    BaseComponent
}
