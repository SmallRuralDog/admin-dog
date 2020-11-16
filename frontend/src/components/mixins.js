const BaseComponent = {
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
        onClick() {
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
