<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'fsd' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')8Gi@$E_)pZt,d<Fd/USe5 i!&:A^eNlw3+pjyk7v0Z]*<yntr^X4cOWt$ZUGAVS' );
define( 'SECURE_AUTH_KEY',  '<URvH*v](vk-LPg} K/d`Mi<TD2dG4[icR)p)q~C(BF/eTBeIRko9!Crq?[RjxLZ' );
define( 'LOGGED_IN_KEY',    '8d3<tqI_{!^AblTf6>Hj_NVOw#D<92%N(Pv&W2|CUEC#^u/XxO+C>gKL,jptmr$P' );
define( 'NONCE_KEY',        'M987p~G}-d%2~bUx1DUBA#p lCnl7*;H;prsOzxDR-g?O%Pxh3HQ}}^AlNu;x`L_' );
define( 'AUTH_SALT',        'uau,lL#E@J`rn;~4HzZ^BTAZG+8@`Mk}=7tLF,^J=0yQ-<Eq{! c.G6FBixb(zi.' );
define( 'SECURE_AUTH_SALT', '8!H[Lvj.Uqpo)T>(m*>=QaC2yl@1RCOLDfM;]vUZC:R1my/h_,)iGGY1$f%z/e`p' );
define( 'LOGGED_IN_SALT',   '7g*$L0VW(`dy&$fP#&h96&=SVu/A)ok1Es[V9DnfsV!l;P|W-OLR;l<O}Qr 0z|.' );
define( 'NONCE_SALT',       'yiM9B<;sP;g-bT-6r21H@>Xy$,)Y=Ec@FZS>64Pm@BDPbvoZOj7u>bk;|}j:kN]j' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
