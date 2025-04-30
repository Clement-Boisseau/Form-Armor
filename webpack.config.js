// webpack.config.js
const Encore = require('@symfony/webpack-encore');
const path = require('path');

// Initialisation
Encore
    // Dossier de sortie
    .setOutputPath('public/build/')
    
    // URL publique
    .setPublicPath('/build')
    
    // Fichier d'entrée principal
    .addEntry('app', './assets/app.js')
    
    // Active le loader SASS
    .enableSassLoader()
    
    // Gestion du runtime
    .enableSingleRuntimeChunk()
    
    // Active jQuery (nécessaire pour Bootstrap 4)
    .autoProvidejQuery()

    .enablePostCssLoader()
    
    // Configuration spécifique Windows
    .configureWatchOptions(watchOptions => {
        watchOptions.poll = 250;
    });

// Exporte la configuration finale
module.exports = Encore.getWebpackConfig();