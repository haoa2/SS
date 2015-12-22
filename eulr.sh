case "$1" in
    sass )
        echo "Sass compiler starting..."
        sass --watch dev/scss:assets/css
    ;;
    ts )
        echo "Typescript compiler starting..."
        tsc -w --outFile assets/js/app.js dev/ts/all --module commonjs
    ;;
    start )
        echo "Starting..."
        php -S 0.0.0.0:8000
    ;;
esac
