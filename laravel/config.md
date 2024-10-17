# Module bundler

Para el desarrollo front end Laravel hace uso de empaquetadores, en versiones anteriores (<8) hacia uso de __Webpack__ y se configuraba en el archivo _webpack.config.js_; ahora utiliza __Vite__ en el archivo _vite.config.js_.

Para el desarrollo frontend tenemos herramientas de empaquetado (JavaScript bundler) como __webpack__, __Parcel__,__Rollup__,  __esbuild__, __Rolldown__.


## Archivos de configuración

_.env_ archivo de config del entorno.

_vite.config.js_ define la configuracion del empaquetado a partir de la ver.9, viene a sustituir _webpack_  usado en la ver.8 y anteriores.
La configuracion de _jetstream_ comienza en _webpack.mix.js_ 
mix...(archivoFuente,archivoCompilado)

_package.json_ para los archivos de presentacion, define las dependencias de node.js





# SASS (Syntactically Awesome Stylesheet)
es una extensión de CSS, siendo un preprocesador para reducir la repeticion de CSS. Un navegador no entiende el codigo SASS, por lo que se debe convertir en CSS estandar, este proceso se le denomina Transpiling (Transpilación: convertir codigo de un lenguaje a otro)