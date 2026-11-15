<?php

/**
 * Autoloader local autocontenido para las dependencias de TCPDF (Com\Tecnick\*)
 * ubicadas en app/ThirdParty/TCPDF/vendor/tecnickcom/
 */
spl_autoload_register(static function (string $class): void {
    $prefix = 'Com\\Tecnick\\';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $baseDir = __DIR__ . '/tecnickcom/';
    $namespaces = [
        'Com\\Tecnick\\Pdf\\Encrypt\\'  => $baseDir . 'tc-lib-pdf-encrypt/src/',
        'Com\\Tecnick\\Pdf\\Filter\\'   => $baseDir . 'tc-lib-pdf-filter/src/',
        'Com\\Tecnick\\Pdf\\Font\\'     => $baseDir . 'tc-lib-pdf-font/src/',
        'Com\\Tecnick\\Pdf\\Graph\\'    => $baseDir . 'tc-lib-pdf-graph/src/',
        'Com\\Tecnick\\Pdf\\Image\\'    => $baseDir . 'tc-lib-pdf-image/src/',
        'Com\\Tecnick\\Pdf\\Page\\'     => $baseDir . 'tc-lib-pdf-page/src/',
        'Com\\Tecnick\\Pdf\\Parser\\'   => $baseDir . 'tc-lib-pdf-parser/src/',
        'Com\\Tecnick\\Pdf\\Sign\\'     => $baseDir . 'tc-lib-pdf-sign/src/',
        'Com\\Tecnick\\Pdf\\'           => $baseDir . 'tc-lib-pdf/src/',
        'Com\\Tecnick\\Unicode\\Data\\' => $baseDir . 'tc-lib-unicode-data/src/',
        'Com\\Tecnick\\Unicode\\'       => $baseDir . 'tc-lib-unicode/src/',
        'Com\\Tecnick\\Barcode\\'       => $baseDir . 'tc-lib-barcode/src/',
        'Com\\Tecnick\\Color\\'         => $baseDir . 'tc-lib-color/src/',
        'Com\\Tecnick\\File\\'          => $baseDir . 'tc-lib-file/src/',
    ];

    foreach ($namespaces as $ns => $dir) {
        $len = strlen($ns);
        if (strncmp($ns, $class, $len) === 0) {
            $relativeClass = substr($class, $len);
            $file = $dir . str_replace('\\', '/', $relativeClass) . '.php';
            if (is_file($file)) {
                require_once $file;
            }
            return;
        }
    }
});
