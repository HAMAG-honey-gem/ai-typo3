<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2014
 */

return array(
	'insert' => array(
		'ansi' => '
			INSERT INTO "fe_users_list_type"( "siteid", "code", "domain", "label", "status",
				"mtime", "editor", "ctime" )
			VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )
		',
	),
	'update' => array(
		'ansi' => '
			UPDATE "fe_users_list_type"
			SET "siteid"=?, "code" = ?, "domain" = ?, "label" = ?, "status" = ?, "mtime" = ?, "editor" = ?
			WHERE "id" = ?
		',
	),
	'delete' => array(
		'ansi' => '
			DELETE FROM "fe_users_list_type"
			WHERE :cond
			AND siteid = ?
		',
	),
	'search' => array(
		'ansi' => '
			SELECT t3feulity."id" AS "customer.lists.type.id", t3feulity."siteid" AS "customer.lists.type.siteid",
				t3feulity."code" AS "customer.lists.type.code", t3feulity."domain" AS "customer.lists.type.domain",
				t3feulity."label" AS "customer.lists.type.label", t3feulity."status" AS "customer.lists.type.status",
				t3feulity."mtime" AS "customer.lists.type.mtime", t3feulity."editor" AS "customer.lists.type.editor",
				t3feulity."ctime" AS "customer.lists.type.ctime"
			FROM "fe_users_list_type" AS t3feulity
			:joins
			WHERE
				:cond
			/*-orderby*/ ORDER BY :order /*orderby-*/
			LIMIT :size OFFSET :start
		',
	),
	'count' => array(
		'ansi' => '
			SELECT COUNT(*) AS "count"
			FROM (
				SELECT DISTINCT t3feulity."id"
				FROM "fe_users_list_type" AS t3feulity
				:joins
				WHERE :cond
				LIMIT 10000 OFFSET 0
			) AS LIST
		',
	),
	'newid' => array(
		'mysql' => 'SELECT LAST_INSERT_ID()'
	),
);