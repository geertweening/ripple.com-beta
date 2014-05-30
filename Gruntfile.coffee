module.exports = (grunt) ->

    # npm tasks
    # ---------

    grunt.loadNpmTasks 'grunt-contrib-watch'
    grunt.loadNpmTasks 'grunt-contrib-less'
    grunt.loadNpmTasks 'grunt-contrib-cssmin'


    # Custom tasks
    # ------------

    grunt.initConfig
        pkg: grunt.file.readJSON 'package.json'

        # minify css files
        cssmin:
            combine:
                files:
                    'wordpress/wp-content/themes/ripple/assets/css/ripple.css': ['wordpress/wp-content/themes/ripple/assets/css/ripple.css']

        # compile less
        less:
            compile:
                options:
                    sourceMap: true
                files:
                     'wordpress/wp-content/themes/ripple/assets/css/ripple.css' : ['wordpress/wp-content/themes/ripple/assets/less/ripple.less']

        # watch for coffee changes
        watch:
            less:
                options: { nospawn: true }
                files: 'wordpress/wp-content/themes/ripple/assets/less/**/*.less'
                tasks: ['build']


    # register tasks
    # --------------

    grunt.registerTask 'build', ['less'] # optional 'cssmin' for minification
    grunt.registerTask 'default', ['build', 'watch']