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
    commit )
        git add .
        git commit -m $2
        git push origin master
    ;;
    tugfa )
        echo "pa ke te digo ke nelzon zhi ya zavanaz k leve la niebe krnaval, tugfa <br><br>"
    ;;
esac
