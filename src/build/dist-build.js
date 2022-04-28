const fs = require("fs-extra")
const path = require("path")
const glob = require("glob")

glob.sync('**/*.*', {
	ignore: [
			'css/!(*.min.css)',	
			'dist/**',
			'js/!(customizer.js|customizer-controls.js|*.min.js)',	
			'node_modules/**',
			'src/**',
			'composer.json',
			'composer.lock',
			'package-lock.json',
			'package.json',
			'phpcs.xml.dist',
			'README.md',
		]
	}
).map(file => {
	fs.copySync(file, path.join('./dist', file))
})