modulue.exports = {
    port : Process.env.PORT,
    files: ["./**/*.{html,htm,css,js,php,json}"],
    server:{
        baseDir: ["./src","./build/contracts"]
    }
}