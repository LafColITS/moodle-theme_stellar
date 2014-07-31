module.exports = function(grunt) {
    grunt.initConfig({
        less: {
            stellar: {
                options: {
                    compress: false
                },  
                src: 'less/stellar.less',
                dest: 'style/stellar.css',
            }   
        },  
        watch: {
            files: ["less/**/*.less"],
            tasks: ["compile"],
            options: {
                spawn: false
            }   
        },  
        replace: {
            font_fix: {
                src: 'style/stellar.css',
                    overwrite: true,
                    replacements: [{
                        from: 'glyphicons-halflings-regular.eot',
                        to: 'glyphicons-halflings-regular.eot]]',
                    }, {
                        from: 'glyphicons-halflings-regular.svg',
                        to: 'glyphicons-halflings-regular.svg]]',
                    }, {
                        from: 'glyphicons-halflings-regular.ttf',
                        to: 'glyphicons-halflings-regular.ttf]]',
                    }, {
                        from: 'glyphicons-halflings-regular.woff',
                        to: 'glyphicons-halflings-regular.woff]]',
                    }]  
            }   
        }   
    }); 

    // Load contrib tasks.
    grunt.loadNpmTasks("grunt-contrib-less");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-text-replace");
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Register tasks.
    grunt.registerTask("default", ["watch"]);
    grunt.registerTask("compile", ["less", "replace:font_fix"]);
}
