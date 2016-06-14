<?php
// Criação de usuário com campos adicionais.
// Este código utiliza o Advanced Custom Fields
// Este código utiliza Bootstrap
?>

<!-- Formulário: Obs, o action é dentro da mesma página  -->
<form method="post" role="form" action="#">

<!-- Campo Nome -->
<div class="form-group"><label>Nome Completo: </label><input class="form-control" type="text" name="full_name" /></div>

<!-- Campo CNPJ - (Este será o login do usuário) -->
<div class="form-group"><label>CNPJ: </label><input class="form-control cnpj_usuario" type="text" name="cnpj" /></div>

<!-- Campo Email -->
<div class="form-group"><label>Email: </label><input class="form-control" type="email" name="email" /></div>

<!-- Campo Password -->
<div class="form-group"><label>Senha: </label><input class="form-control" type="password" name="password" /></div>

<?php
// Obtem as publicações da post_type | acf-field |, post_parent | 6 | - (Troque o 6 pelo número do post de seu grupo)
$args = array('post_type' => 'acf-field', 'post_parent' => 6);

// Localiza as publicações
$posts_total = new WP_Query($args); 

// Verifica as publicações
while ( $posts_total->have_posts() ) {

// Imprime o post
$posts_total->the_post();

// Cria um atalho, onde a array values é igual a $posts_total -> post
$values = $posts_total->post;
?>

<!-- Cria um formulário e o label, onde o label é o título do campo -->
<div class="form-group"><label for="email"><?php echo $values->post_title ?>: </label>

<!-- Cria o input a ser preenchido, onde a classe e o name é o nome do campo -->
<input class="form-control <?php echo $values->post_excerpt; ?>" type="text" name="<?php echo $values->post_excerpt; ?>" /></div>

<!-- Cria um campo invisível que é a key do campo em questão. Isto é necessário para o valor acima ser inserido nesta chave -->
<input class="form-control" type="hidden" name="_<?php echo $values->post_excerpt ?>" value="<?php echo $values->post_name; ?>" />

<!-- Finaliza o while e adiciona a função wp_reset_postdata() para reiniciar a função -->
<?php } wp_reset_postdata(); ?>

<!-- Botão submit para enviar os dados -->
<button type="submit" value="click" name="submit" class="btn btn-default">Cadastrar</button>

<!-- Fecha o formulário -->
</form> 

<?php
// Caso o botão submit seja selecionado:
if(isset($_POST['submit'])):

  // Array q ser inserido no wp_insert_user()
  $userdata = array(
    'ID' => NULL, // Cria um id
    'user_login'  =>  str_replace(array("/", "-", "."), "", $_POST['cnpj']), // O login será = ao campo | cnpj |
    'first_name' => $_POST['full_name'], // O nome será = ao campo | full_name |
    'user_email'  =>  $_POST['email'], // O email será = ao campo | email |
    'user_pass'   =>  $_POST['password'], // O password será = ao campo | password | - O proprio wordpress gera a chave.
  );

  // Detecta o ID do usuário
  $user_id = wp_insert_user($userdata);

  // Insere o usuário junto com a array
  wp_insert_user($userdata);


  // Novamente, obtem as publicações da post_type | acf-field |, post_parent | 6 | - (Troque o 6 pelo número do post de seu grupo)
  // Isto é necessário para que os campos do Advanced Custom Fields sejam impressos no banco de dados.
  $args = array('post_type' => 'acf-field', 'post_parent' => 6);
  
  // Localiza as publicações
  $posts_total = new WP_Query($args); 

  // Verifica as publicações
  while ( $posts_total->have_posts() ) {

  // Imprime o post
  $posts_total->the_post();

  // Cria um atalho, onde a array values é igual a $posts_total -> post
  $values = $posts_total->post;

  // No loop do while, ele localiza o nome dos campos e a key, para inserir os valores digitados.
  // Primeiro, ele adiciona o valor digitado no campo do nome
  update_user_meta( $user_id, $values->post_excerpt, $_POST["$values->post_excerpt"]);

  // Depois, ele adiciona o a key do campo dentro do nome
  update_user_meta( $user_id, "_$values->post_excerpt", $values->post_name);

  // Finaliza o while e reseta a publicação.
  } wp_reset_postdata();

endif; 
?>
