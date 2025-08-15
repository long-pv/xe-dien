const browserSync = require("browser-sync").create();
const sass = require("sass");
const fs = require("fs");
const path = require("path");

// Thư mục SCSS và CSS
const scssDir = path.join(__dirname, "assets/scss");
const cssDir = path.join(__dirname, "assets/css");

// File SCSS chính cần build
const mainFiles = [
	"main.scss", // thêm tên file chính nếu cần
];

// Tạo thư mục CSS nếu chưa tồn tại
if (!fs.existsSync(cssDir)) {
	fs.mkdirSync(cssDir, { recursive: true });
}

// Hàm log màu
function logSuccess(msg) {
	console.log(`\x1b[32m✅ ${msg}\x1b[0m`);
}
function logError(msg) {
	console.error(`\x1b[31m❌ ${msg}\x1b[0m`);
}

// Compile SCSS -> CSS (compressed)
function compileScss(file) {
	try {
		const scssPath = path.join(scssDir, file);
		const baseName = file.replace(".scss", "");

		const compressed = sass.compile(scssPath, {
			style: "compressed",
			quietDeps: true,
			logger: sass.Logger.silent,
		});

		fs.writeFileSync(path.join(cssDir, `${baseName}.css`), compressed.css);
		logSuccess(`Đã build: ${baseName}.css`);

		browserSync.reload("*.css");
	} catch (error) {
		logError(`Lỗi biên dịch SCSS (${file}): ${error.message}`);
	}
}

// Build tất cả file chính
function buildAllMain() {
	mainFiles.forEach((file) => compileScss(file));
}

// Watch SCSS (kể cả partial)
fs.watch(scssDir, { recursive: true }, (event, filename) => {
	if (!filename) {
		console.warn("⚠️ Tên file thay đổi là null, bỏ qua");
		return;
	}
	if (filename.endsWith(".scss")) {
		buildAllMain();
	}
});

// Khởi chạy BrowserSync
browserSync.init({
	proxy: "http://localhost:81/wp/xe-dien/",
	files: ["**/*.php", "**/*.js", "assets/css/*.css"],
	reloadDelay: 200,
	open: true,
});

// Build ban đầu
buildAllMain();
