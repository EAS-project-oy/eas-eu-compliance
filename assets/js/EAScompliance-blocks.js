// Woocommerce blocks utility functions

    const { useRef, useEffect } = wp.element

    const usePrevious = (value, initialValue) => {
        const ref = useRef(initialValue)
        useEffect(() => {
            ref.current = value
        })
        return ref.current
    }

    window.eascompliance ??= {}

    // check which dependency triggered useEffect
    window.eascompliance.useEffectDebugger = (effectHook, dependencies, dependencyNames = []) => {
        const previousDeps = usePrevious(dependencies, [])

        const changedDeps = dependencies.reduce((accum, dependency, index) => {
            if (dependency !== previousDeps[index]) {
                const keyName = dependencyNames[index] || index
                return {
                    ...accum,
                    [keyName]: {
                        before: previousDeps[index],
                        after: dependency
                    }
                }
            }

            return accum
        }, {})

        if (Object.keys(changedDeps).length) {
            console.log('useEffectDebugger', changedDeps)
        }

        useEffect(effectHook, dependencies)
    }

    // emulate input event that react understands
    window.eascompliance.nativeInput = (element, newValue) => {
        const nativeInputValueSetter = Object.getOwnPropertyDescriptor(window.HTMLInputElement.prototype, 'value').set
        nativeInputValueSetter.call(element, newValue)
        const event = new Event('input', { bubbles: true })
        element.dispatchEvent(event)
        return event
    }