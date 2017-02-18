## INSTLATION
1. install PHP7
2. install [ast extension](https://github.com/nikic/php-ast)

## USAGE
ast.php's output is JSON that represents AST.
remove_lineno.php filters out lineno and doccomment from AST.
```sh
php ./bin/ast.php /your/file/path.php | php ./bin/remove_lineno.php
```