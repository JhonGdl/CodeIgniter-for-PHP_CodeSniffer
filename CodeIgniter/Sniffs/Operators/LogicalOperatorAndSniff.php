<?php

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * CodeIgniter_Sniffs_Operators_LogicalOperatorAndSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Thomas Ernest <thomas.ernest@baobaz.com>
 * @copyright 2006 Thomas Ernest
 * @license   http://thomas.ernest.fr/developement/php_cs/licence GNU General Public License
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * CodeIgniter_Sniffs_Operators_LogicalOperatorAndSniff.
 *
 * Ensures that the logical operator 'AND' is in upper case and suggest the use of its symbolic equivalent.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Thomas Ernest <thomas.ernest@baobaz.com>
 * @copyright 2006 Thomas Ernest
 * @license   http://thomas.ernest.fr/developement/php_cs/licence GNU General Public License
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class CodeIgniter_Sniffs_Operators_LogicalOperatorAndSniff implements Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for: symbolic and literal operators and.
     *
     * @return array
     */
    public function register()
    {
        return array(
            T_LOGICAL_AND,
        );

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param File $phpcsFile The current file being scanned.
     * @param int  $stackPtr  The position of the current token
     *                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $operator_token = $tokens[$stackPtr];
        $operator_string = $operator_token['content'];
        $operator_code = $operator_token['code'];

        if ($operator_string !== strtoupper($operator_string)) {
            $error_message = 'Logical operator should be in upper case;'
                . ' use "' . strtoupper($operator_string)
                . '" instead of "' . $operator_string . '"';
            $phpcsFile->addError($error_message, $stackPtr, 'LogicalOperatorAndSniff');
        }

        $warning_message = 'The symbolic form "&&" is preferred over the literal form "AND"';
        $phpcsFile->addWarning($warning_message, $stackPtr, 'LogicalOperatorAndSniff');

    }//end process()


}//end class

?>
