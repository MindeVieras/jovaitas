//Gruntfile
'use strict';

module.exports = function(grunt) {
  //Initializing the configuration object
  grunt.initConfig({
    sass: {
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          "./sites/all/themes/jova/css/style.css" : "./sites/all/themes/jova/sass/main.scss"
        }
      },
      prod: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          "./sites/all/themes/jova/css/style.css" : "./sites/all/themes/jova/sass/main.scss"
        }
      }
    },
    // uglify: {
    //     prod: {
    //         files: {
    //             './themes/almond/js/build/scripts.js': [
    //                 './themes/almond/js/source/*.js'
    //             ]
    //         },
    //         options: {
    //             mangle: true,
    //             compress: true,
    //             sourceMap: true
    //         }
    //     },
    // },
    watch: {
      // js: {
      //     files: ['./themes/almond/js/source/*.js'],
      //     tasks : [
      //         'uglify:prod'
      //     ]
      // },
      sass: {
        files: ['./sites/all/themes/jova/sass/**/*.scss'],
        tasks: [
          'sass:prod'
        ]
      },
      options: {
        livereload: true
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Task definition
  grunt.registerTask('default', [
    'sass:dev',
    // 'uglify',
    'watch'
  ]);

  grunt.registerTask('build', [
    'sass:prod',
    // 'uglify'
  ]);

};
