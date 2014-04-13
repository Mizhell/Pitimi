module.exports = function(grunt) {

    'use strict';

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        watch: {
            serve: {
                files: [
                    'Gruntfile.js',
                    'public/assets/scss/**/*',
                    'public/assets/js/**/*',
                    'public/assets/img/**/*',
                    'app/**/*',
                    '!app/storage/**/*'
                ],
                tasks: ['jshint', 'sass:serve'],
                options: {
                    livereload: 8009
                }
            }
        },

        shell: {
            artisanServe: {
                options: {
                    stdout: true
                },
                command: 'php artisan serve'
            }
        },

        concurrent: {
            watchers: {
                tasks: ['watch', 'shell'],
                options: {
                    logConcurrentOutput: true
                }
            }
        },

        jshint: {
            files: ['Gruntfile.js', 'public/assets/js/**/*.js'],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        requirejs: {
            compile: {
                options: {
                    baseUrl: './public/assets/js/',
                    name: '../bower_components/almond/almond',
                    include: ['main'],
                    insertRequire: ['main'],
                    mainConfigFile: './public/assets/js/config.js',
                    out: './public/assets/dist/main.js',
                    findNestedDependencies: true,
                    optimize: 'uglify2',
                    preserveLicenseComments: false,
                    wrap: {
                        start: '(function () {',
                        end: '}).call(this);'
                    }
                }
            }
        },

        sass: {
            serve: {
                files: {
                    'public/assets/css/main.css': 'public/assets/scss/main.scss'
                },
                options: {
                    outputStyle: 'nested'
                }
            },
            build: {
                files: {
                    'public/assets/dist/main.css': 'public/assets/scss/main.scss'
                },
                options: {
                    outputStyle: 'compressed'
                }
            }
        },

        /* Image processing */

        imagemin: {
            all: {
                options: {
                    optimizationLevel: 3,
                    progressive: true
                },
                files: [{
                    expand: true,
                    cwd: './',
                    src: ['public/assets/img/**/**/*.png', 'public/assets/img/**/**/*.jpg'],
                    dest: './',
                }]
            }
        }

    });

    grunt.registerTask('serve', ['jshint', 'sass:serve', 'concurrent']);
    grunt.registerTask('build', ['jshint', 'sass:build', 'requirejs:compile']);
    grunt.registerTask('default', ['serve']);
};
