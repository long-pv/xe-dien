// bs.js
const browserSync = require("browser-sync").create();

browserSync.init({
	proxy: "http://localhost:81/wp/xe-dien/", // ← chính xác tên site bạn đang chạy trên localhost
	files: ["**/*.php", "**/*.css", "**/*.scss", "**/*.js"],
	reloadDelay: 200,
	open: true, // tự mở trình duyệt
});
