export const Box = (x) => ({
    map: fn => Box(fn(x)),
    fold: fn => fn(x)
})