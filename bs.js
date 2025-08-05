// bs.js
const browserSync = require("browser-sync").create();

browserSync.init({
	proxy: "http://localhost/wp/xe-dien/", // ← chính xác tên site bạn đang chạy trên localhost
	files: ["**/*.php", "**/*.css", "**/*.js"],
	reloadDelay: 200,
	open: true, // tự mở trình duyệt
});
