// vue.config.js
module.exports = {
  filenameHashing: false,
  css: {
    loaderOptions: {
      sass: {
        data: `
          @import "@/assets/styles/main.scss";
        `
      }
    }
  }
}
