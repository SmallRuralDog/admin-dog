import Vue from 'vue'
import upperFirst from 'lodash/upperFirst'
import camelCase from 'lodash/camelCase'

const requireCommonComponent = require.context(
    // The relative path of the components folder
    '@/components/commonComponents',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /Base[A-Z]\w+\.(vue|js)$/
)

requireCommonComponent.keys().forEach(fileName => {
    // Get component config
    const componentConfig = requireCommonComponent(fileName)
    // Get PascalCase name of component
    const componentName = upperFirst(
        camelCase(
            // Gets the file name regardless of folder depth
            fileName
                .split('/')
                .pop()
                .replace(/\.\w+$/, '')
        )
    )
    // Register component globally
    Vue.component(
        componentName,
        // Look for the component options on `.default`, which will
        // exist if the component was exported with `export default`,
        // otherwise fall back to module's root.
        componentConfig.default || componentConfig
    )
})


const requireComponent = require.context(
    // The relative path of the components folder
    '@/components/vuetify',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /V[A-Z]\w+\.(vue|js)$/
)


requireComponent.keys().forEach(fileName => {
    // Get component config
    const componentConfig = requireComponent(fileName)
    // Get PascalCase name of component
    const componentName = upperFirst(
        camelCase(
            // Gets the file name regardless of folder depth
            fileName
                .split('/')
                .pop()
                .replace(/\.\w+$/, '')
        )
    )
    // Register component globally
    Vue.component(
        componentName+'Pro',
        // Look for the component options on `.default`, which will
        // exist if the component was exported with `export default`,
        // otherwise fall back to module's root.
        componentConfig.default || componentConfig
    )
})


const requireAdminProComponent = require.context(
    // The relative path of the components folder
    '@/components/adminPro',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /V[A-Z]\w+\.(vue|js)$/
)


requireAdminProComponent.keys().forEach(fileName => {
    // Get component config
    const componentConfig = requireAdminProComponent(fileName)
    // Get PascalCase name of component
    const componentName = upperFirst(
        camelCase(
            // Gets the file name regardless of folder depth
            fileName
                .split('/')
                .pop()
                .replace(/\.\w+$/, '')
        )
    )
    // Register component globally
    Vue.component(
        componentName+'Pro',
        // Look for the component options on `.default`, which will
        // exist if the component was exported with `export default`,
        // otherwise fall back to module's root.
        componentConfig.default || componentConfig
    )
})
