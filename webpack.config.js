const path = require("path");

module.exports = {
  mode: "production",
  entry: {
    app: "./Public/Assets/js/app.mjs",
    login: "./Public/Assets/js/swallogin.mjs",
    regist: "./Public/Assets/js/swalregist.mjs",
    home: "./Public/Assets/js/slider.mjs",
  },
  output: {
    path: path.resolve(__dirname, "output"),
    filename: "js/[name].bundle.js",
  },
};
