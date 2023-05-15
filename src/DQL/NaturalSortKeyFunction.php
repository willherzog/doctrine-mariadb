<?php

namespace WHDoctrine\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Subselect;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * Add support for the MariaDB 10.7+ function NATURAL_SORT_KEY.
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
class NaturalSortKeyFunction extends FunctionNode
{
	protected $orderByItem;

	public function parse(Parser $parser): void
	{
		$parser->match(Lexer::T_IDENTIFIER);
		$parser->match(Lexer::T_OPEN_PARENTHESIS);

		$this->orderByItem = $parser->OrderByItem();

		$parser->match(Lexer::T_CLOSE_PARENTHESIS);
	}

	public function getSql(SqlWalker $sqlWalker): string
	{
		return 'NATURAL_SORT_KEY(' . $this->orderByItem . ')';
	}
}
