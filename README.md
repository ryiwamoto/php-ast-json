## INSTLATION
1. install PHP7
2. install [ast extension](https://github.com/nikic/php-ast)

## USAGE
ast.php's output is JSON that represents AST.
remove_lineno.php filters out lineno and doccomment from AST.
```sh
cat /your/file.php | php ./bin/ast.php | php ./bin/remove_lineno.php
```