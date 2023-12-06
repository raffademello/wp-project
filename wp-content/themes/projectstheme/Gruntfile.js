module.exports = grunt => {

	require("load-grunt-tasks")(grunt)

	grunt.loadNpmTasks('grunt-contrib-watch')
	grunt.loadNpmTasks('grunt-contrib-sass');

	const findes6 = require("./findes6")
	const files = findes6('../')

	let babelFiles = {}
	files.forEach((file)  => {
		babelFiles[file.replace(/\.es6/, '')] = file
	})

	// Configuração
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				files: {
					'assets/css/custom.css':'assets/scss/custom.scss'
				}
			}
		},
		watch: {
			styles: {
				files: [...files, 'assets/scss/**/*.scss'],
				tasks: ['sass', 'babel'],
				options: {
					nospawn: true
				}
			}
		},
		babel: {
			options: {
				sourceMap: true,
				presets: ["@babel/preset-env", "minify"]
			},
			dist: {
				files: babelFiles
			}
		}
	});
	grunt.registerTask('default', ['sass', 'babel', 'watch']);
};