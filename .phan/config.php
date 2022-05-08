<?php

return [
    'target_php_version' => '7.4',

    'directory_list' => [
        'src',
        'vendor/aws',
        'vendor/craftcms',
        'vendor/webonyx',
        'vendor/yiisoft',
    ],
    'exclude_analysis_directory_list' => [
        'vendor',
    ],
    'exclude_file_regex' => '@^vendor/.*/(tests|Tests)/@',

    'minimum_severity' => 5,
    'quick_mode' => true,
    'backward_compatibility_checks' => false,
    'dead_code_detection' => false,
    'allow_missing_properties' => false,
    'strict_object_checking' => true,
    'check_docblock_signature_return_type_match' => true,
    'check_docblock_signature_param_type_match' => true,
    'prefer_narrowed_phpdoc_param_type' => true,
    'prefer_narrowed_phpdoc_return_type' => true,
    // 'unused_variable_detection' => true,

    'plugins' => [
        'AlwaysReturnPlugin',
        'DollarDollarPlugin',
        // 'UnreachableCodePlugin',
        'DuplicateArrayKeyPlugin',
        'PregRegexCheckerPlugin',
        'PrintfCheckerPlugin',
        'UseReturnValuePlugin',
        // 'UnknownElementTypePlugin',
        // 'DuplicateExpressionPlugin',
        // 'PossiblyStaticMethodPlugin',
        // 'PHPDocToRealTypesPlugin',
        // 'PHPDocRedundantPlugin',
        'PreferNamespaceUsePlugin',
        'EmptyStatementListPlugin',
        'LoopVariableReusePlugin',
        'StrictLiteralComparisonPlugin',
        'ShortArrayPlugin',
        'SimplifyExpressionPlugin',
        'RemoveDebugStatementPlugin',
    ],

    'suppress_issue_types' => [
        'PhanClassContainsAbstractMethod',
        'PhanPluginMixedKeyNoKey',
        'PhanRedefinedClassReference',
        'PhanTypeInvalidCallableArraySize', // https://github.com/phan/phan/issues/1648
    ],
];
