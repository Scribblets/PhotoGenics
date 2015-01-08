module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      js: {
        src: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
          'bower_components/jquery-masonry/dist/masonry.pkgd.min.js'
        ],
        dest: 'public/assets/javascripts/application.js'
      }
    },
    uglify: {
      options: {
        mangle: false
      },
      js: {
        files: {
          'public/assets/javascripts/application.js': 'public/assets/javascripts/application.js'
        }
      }
    },    
    sass: {
      development: {
        files: {
          'public/assets/stylesheets/application.css':'public/assets/stylesheets/application.scss',
          'public/assets/stylesheets/bootstrap.css':'bower_components/bootstrap-sass-official/assets/stylesheets/bootstrap.scss'
        }
      }
    },
    watch: {
      js: {
        files: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
          'bower_components/jquery-masonry/dist/masonry.pkgd.min.js',
          'public/assets/javascripts/*.js'
          ],
        tasks: ['concat:js', 'uglify:js']
      },
      sass: {
        files: ['public/assets/stylesheets/*.scss', 'bower_components/bootstrap-sass-official/assets/stylesheets/*.scss'],
        tasks: ['sass']
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['watch'])

};