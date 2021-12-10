<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $comentario = (isset($_POST["comentario"]) && $_POST["comentario"] != null) ? $_POST["comentario"] : "";
} else if (!isset($id)) {
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $comentario = NULL;
}
try {
    $conexao = new PDO("mysql:host=localhost;dbname=portifolio", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:".$erro->getMessage();
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE FEEDBACK SET nome=?, comentario=? WHERE id = ?");
            $stmt->bindParam(3, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO FEEDBACK (nome, comentario) VALUES (?, ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $comentario);
 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<div class='feedback-pop'>".
						"<div class='feedback-pop1'>".
							"<div class='feedback-pop2'>"."Comentário enviado com sucesso!"."</div>".
							"<a href='../index.php' class='feedback-pop3'>X</a>".
						"</div>".
					"</div>";
                $id = null;
                $nome = null;
                $comentario = null;
            } else {
                echo "Erro ao tentar salvar o comentário";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>- Apresentação - KELVIN HENRIQUE -</title>
	<link rel="stylesheet" type="text/css" href="_ESTILOS/css.css" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<script language="JavaScript">
		 var repeat=1
		 var title=document.title
		 var leng=title.length
		 var start=1
		 function titlemove() {
		 titl=title.substring(start, leng) + title.substring(0, start)
		 document.title=titl
		 start++
		 if (start==leng+1) {
		 start=0
		 if (repeat==0)
		 return
		 }
		 setTimeout("titlemove()",240)
		 }
		 if (document.title)
		 titlemove()
	</script>
</head>
<body class="fundo">
	<div class="quadrado_inicio">
		<form name="letreiro" method="post">
			<div align="center">
				<input type="submit" name="banner" class="quadrado2">
					<script language="JavaScript">
						var id,pause=0,position=0; 
						function banner() {
						var i,k,msg="                                                                                                                                             Olá, Seja Bem-Vindo(a) ao meu PORTIFÓLIO, fique a vontade!                                                                                                                                                                         ";
						k=(300/msg.length)+1;
						for(i=0;i<=k;i++) msg+=" "+msg;
						document.letreiro.banner.value=msg.substring(position,position+1349);
						if(position++==msg.length) position=0;
						id=setTimeout("banner()",70); }
						banner();
					</script>
			</div>
		</form>
	</div>
	<div class="quadrado1">
		<div class="container6">
			<div class="containerIMAGEM"></div>
			<div class="containerAPRESENTACAO">
				<div class="estilo-1"><b>Nome: </b></div>
					<div class="estilo-2">KELVIN HENRIQUE FERREIRA</div>
						<div class="estilo-1"><b>Data nascimento:</b></div>
							<div class="estilo-2">17/02/1999 - 
								<?php
									$nasc = 1999;
									$hoje = date("Y");
									$idade = $hoje - $nasc;
										echo $idade;
								?> anos</div>
								<div class="estilo-1"><b>Aréa de atuação:</b></div>
									<div class="estilo-2">TI | TECNOLOGIA</div>
										<div class="estilo-3"><b>Conhecimentos e Aprendizagens</b></div>
											<div class="container8" title="HTML 5" ></div>
											<div class="container9" title="CSS 3" ></div>
											<div class="container18" title="JAVA" ></div>
											<div class="container10" title="JAVASCRIPT" ></div>
											<div class="container11" title="PHP" ></div>
											<div class="container16" title="EXCEL" ></div>
											<div class="container15" title="CALC" ></div>
											<div class="container19" title="MANUTENÇÃO" ></div>
											<div class="container20" title="MONTAGEM" ></div>
											<div class="container12" title="MYSQL" ></div>
											<div class="container17" title="SQL SERVER" ></div>
											<div class="container21" title="CMD" ></div>
											<div class="container13" title="NODE JS" ></div>
											<div class="container14" title="REACT NATIVE" ></div>
			</div>
				<div class="estilo-4"><a href="_CURRICULO/KELVIN.pdf" class="tirar" target="_blank">Veja meu curriculo. Faça o download aqui!</a></div>
				<div class="menu">
					<ul class="menu1">
						<li><a href="#">SOBRE</a></li>
						<li><a href="#">PROJETOS</a></li>
						<li><a href="#">CONTATOS</a></li>
						<li><a href="#">FEEDBACK</a></li>
						<li><a href="#">CERTIFICADOS</a></li>
						<li><a href="_CURRICULO/KELVIN.pdf" class="tirar" target="_blank">BAIXE MEU CURRICULO</a></li>
					</ul>
				</div>
		</div>
			<div class="linha"></div>
		<div class="container22">
			<div class="estilo-5">
				<h1>Sobre: KELVIN HENRIQUE FERREIRA</h1>
			</div>
		<div class="estilo-6">Comecei minha carreira profissional aos meus 16 anos, em 2015. 
			<br/>Inicie como estagiário na Empresa IMATEC, onde estou até nos dias de hoje. São 6 anos de empresa!
			Nessa empresa, comecei com a função de digitação dos documentos, que na época eram documentos diversos, desde prontuario de hospitais até documentos de faculdades... Depois de um tempo nessa função me colocaram para conferir o que os meus colegas digitavam, ou seja, antes eu indexava agora passei a conferir essa indexação.
			<br/> Ao final do contrato de estágio, fui contratado como funcionário, passei a exercer o cargo Auxiliar de Operação, basicamente continuava fazendo as mesmas tarefas, indexar, conferir, porém passei a ter mais algumas funções e responsabilidades, como controle de qualidade de imagens, comecei a fazer serviços específicos que não era "qualquer" pessoa que fazia, porém eu não me acomodava no meu cargo, sempre quis saber das funções dos outros departamentos, como que tal equipe trabalhava, como esse documento chegou a mim e etc. Demonstrei interesse em saber os processos da empresa, e tentar ajudar o máximo de pessoas que conseguisse, independente do departamento.
			<br/>Com tudo isso em processo, em 2018 tive a oportunidade em trocar de equipe, e fazer parte da "TI" da empresa, onde eu tinha mais recursos disponíveis a tecnologia, foi ai que comecei a estudar a área da TECNOLOGIA, comecei a cursar Análise e Desenvolvimento de Sistemas (FECAF - Taboão da Serra/SP). Fui promovido a Auxiliar de Informática, ai mudou totalmente a minha função, comecei a mexer com ferramentas que exigiam um pouco de conhecimento como Mysql, Sql Server, Excel e CALC (planilhas), comecei a ter acesso a montagem e manutenção de computadores, impressoras e scanners, dava algumas funções para os robôs do sistema,  eu era responsável por tratar e disponibilizar imagens para os clientes por meio do sistemas, dava suporte ao cliente e aos colaboradores, quando não conseguiam acessar a imagem, erros diversos que um sistema ou usuário pode ocorrer e/ou cometer, por motivos diversos. Nesse mecanismo comecei a trabalhar com varias ferramentas, sendo MySql, Sql Server, EXCEL/CALC, CMD, SOFTWARE da empresa, enfim...
			<br/> Com a automatização desses processos, cada vez mais foi desfazendo a equipe, e assim fui me destacado dos demais colegas, pois a equipe estava se reduzindo aos poucos pois o processo que antes era manual, estava sendo quase tudo automatizado, e eu sempre buscava entender os outros departamentos da empresa, ajudando as equipes e com isso obtendo experiências, para que nunca ficasse parado em um "lugar" só da empresa, sempre tentando me evoluir e assim também evoluir a equipe.
			<br/> No final de 2019, eu já não tinha colegas de trabalho, eles foram desligados da empresa um por um, sobrando somente eu, fiquei com medo, pois estava vendo meus colegas de trabalho saindo e estava esperando que chega-se a minha vez, mas isso não aconteceu. Continuei até o começo de 2021 nesse trabalho "solitário", que já não era tão pesado e que eu conseguia fazer tranquilamente devido as meus conhecimentos já no departamento e nos serviços, já que por vez o processo já estava quase tudo automatizado.
			<br/>Em 2021, bem no começo do ano, recebi a proposta de subir de cargo para líder de um departamento chamado DIGITALIZAÇÃO, no cargo de Assistente de Digitalização Pleno. Agora comecei a ter pensamentos de um líder, ajudar o próximo, saber ouvir, saber se comunicar de maneira clara e objetiva, planejar metas, ajudar meus superiores à tomadas de decisões, enfim.. Com o passar dos tempos, desde que comecei a trabalhar, com 16 anos, não tive a oportunidade em trabalhar com programação, trabalhar com uma equipe que desenvolva algo, venho estudando para que meus conhecimentos sejam não só na teoria, mas também na prática, por isso comecei a desenvolver <a href="#" class="estilo-7">PROJETOS</a> que estão disponíveis para visualização. E assim que ter uma oportunidade também na área de programação, para aprender e ajudar a equipe com meus conhecimentos, para que todos nós possamos crescer.
			<br/>
				<div class="">
					Venho aprendendo as linguagens de programação: PHP, JAVASCRIPT, JAVA, HTML5, CSS3, PYTHON, MS-DOS (CMD), SQL. As principais que estudo são: HTML5, CSS3, PHP, JAVASCRIPT, SQL.
					<br/>
					Tenho conhecimentos em: Montagem e manutenção de computadores, notebooks, impressoras, scanners.
					<br/>
					Conhecimentos em uso de Softwares: Pacote OFFICE (Principalmente EXCEL), CALC da LibreOffice, MySql WorkBench, Sql Server.
				</div>
		</div>
		</div>
		<div class="linha"></div>
		<div class="quadrado_certificado">
			<div class="estilo-5">
				<h1>CERTIFICADOS</h1>
			</div>
			<table class="tabela_certificado">
				<tr>
					<td class="tabela_certificado1">NOME DO CURSO</td>
					<td class="tabela_certificado1">ANO</td>
					<td class="tabela_certificado1">NÍVEL</td>
					<td class="tabela_certificado1">INSTITUIÇÃO</td>
					<td class="tabela_certificado1">VISUALIZAR</td>
				</tr>
				<tr>
					<td class="tabela_certificado2">EXCEL - 2010</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/1.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">FUNDAMENTOS DE TI | HARDWARE - SOFTWARE</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/2.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">HTML</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">BÁSICO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/3.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">HTML</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">AVANÇADO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/4.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">HTML e CSS NA PRÁTICA</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/5.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">INOVANDO COM CSS</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/6.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">IMPLEMENTANDO BANCO DE DADOS</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/7.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">JAVA</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">BÁSICO</td>
					<td class="tabela_certificado2-alinhado">CURSO EM VÍDEO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/8.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">LINGUA INGLESA</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">BÁSICO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/9.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">LINGUA INGLESA - ADJETIVOS</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">BÁSICO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/10.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">LINGUA INGLESA - VERBOS DO FUTURO</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">BÁSICO</td>
					<td class="tabela_certificado2-alinhado">FUNDAÇÃO BRADESCO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/11.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
				<tr>
					<td class="tabela_certificado2">MYSQL</td>
					<td class="tabela_certificado2-alinhado">2020</td>
					<td class="tabela_certificado2-alinhado">INTERMEDIÁRIO</td>
					<td class="tabela_certificado2-alinhado">CURSO EM VÍDEO</td>
					<td class="tabela_certificado3"><a href="_DIPLOMAS/12.pdf" target="_blank" class="e1">VISUALIZAR</a></td>
				</tr>
			</table>
		</div>
		<div class="linha"></div>
		<div class="quadrado_projeto">
			<div class="container1">
				<div class="containerCALCULAR"></div>
				<div class="container3">PROJETO - CALCULAR IDADE</div>
				<div class="container4">Meu primeiro programa em PHP. <br/>Um programa simples que calcula a idade, o usuário precisa informar qual o ano de seu nascimento, para que assim o sistema possa fazer a conta de quantos anos o usuário tem! <br/> Simples e objetivo não é? <br/>Veja abaixo o projeto rodando</div>
				<div class="containerHTML"></div>
				<div class="containerCSS"></div>
				<a href="_PROJETOS/PROJETO_CALCULAR_IDADE/index.html" target="_blank">
					<div class="containerCARREGANDO" title="Clique para abrir o projeto!"></div>
				</a>
				<div class="containerPHP"></div>
				<div class="container5"></div>
			</div>
			<div class="container1">
				<div class="container2"></div>
				<div class="container3">PROJETO - CALCULADORA</div>
				<div class="container4">Uma calculadora simples em linguagem PHP que, soma, divide, multiplica e subtrai. <br/>Veja abaixo o projeto rodando</div>
				<div class="containerHTML"></div>
				<div class="containerCSS"></div>
				<a href="_PROJETOS/PROJETO_CALCULADORA/index.php" target="_blank">
					<div class="containerCARREGANDO" title="Clique para abrir o projeto!"></div>
				</a>
				<div class="containerPHP"></div>
				<div class="container5"></div>
			</div>
			<div class="container1">
				<div class="container2"></div>
				<div class="container3">PROJETO - RH</div>
				<div class="container4">Programa desenvolvido para RH, cadastramento e visualizações de funcionários.<br/>Veja abaixo o projeto rodando</div>
				<div class="containerHTML"></div>
				<div class="containerCSS"></div>
				<a href="_PROJETOS/PROJETO_RH/DESENVOLVIMENTO/index.php" target="_blank">
					<div class="containerCARREGANDO" title="Clique para abrir o projeto!"></div>
				</a>
				<div class="containerMYSQL"></div>
				<div class="container5"></div>
			</div>
			<div class="container1">
				<div class="container2"></div>
				<div class="container3">PROJETO - SALÃO</div>
				<div class="container4">Programa criado nas linguagens <br/>HTML5, CSS3, PHP, JAVASCRIPT, MySQL. <br/>O usuário consegue cadastrar seus clientes, cadastrar os procedimentos que os clientes irão fazer e também os horarios que eles serão atendidos. Com base nisso, ele poderá ver quais os próximos clientes agendados, etc <br/>Veja abaixo o projeto rodando</div>
				<div class="containerHTML"></div>
				<div class="containerCSS"></div>
				<a href="_PROJETOS/PROJETO_SALAO/index.php" target="_blank">
					<div class="containerCARREGANDO" title="Clique para abrir o projeto!"></div>
				</a>
				<div class="containerMYSQL"></div>
				<div class="container5"></div>
			</div>
			<div class="container1">
				<div class="containerARQUIVO"></div>
				<div class="container3">PROJETO - ARQUIVO</div>
				<div class="container4">Programa simples, onde o usuário cadastra a caixa em seu respectivo local, com base nisso o sistema mostra qual a localização desta caixa. Ficou um pouco confuso?<br/>Veja abaixo o projeto rodando</div>
				<div class="containerHTML"></div>
				<div class="containerCSS"></div>
				<a href="_PROJETOS/PROJETO_ARQUIVO/DESENVOLVIMENTO/index.php" target="_blank">
					<div class="containerCARREGANDO" title="Clique para abrir o projeto!"></div>
				</a>
				<div class="containerMYSQL"></div>
				<div class="containerPHP"></div>
			</div>
		</div>
		<div class="linha"></div>
		<div class="quadradoFeedback">
			<div class="quadrado3"></div>
				<form method="post" name="FEEDBACK" action="?act=save">
					<input type="hidden" name="id" <?php
							if (isset($id) && $id != null || $id != "") {
								echo "value=\"{$id}\"";
							}?>/>
					<div class="estilo1"><h1>ENVIE SEU FEEDBACK</h1></div>
						<div class="estilo2">INSIRA SEU NOME (OPCIONAL)</div>
							<input class="estilo_botao" type="text" name="nome" maxlength="47" value="Anônimo"
								<?php
									if (isset($nome) && $nome != null || $nome != ""){
									echo "value=\"{$nome}\"";
									}?>/>
									<div class="estilo3">INSIRA O SEU COMENTÁRIO SOBRE O SITE</div>
										<textarea class="estilo_botao1" name="comentario"
											<?php
												if (isset($comentario) && $comentario != null || $comentario != ""){
												echo "value=\"{$comentario}\"";
												}?>></textarea>
												<br/>
													<input class="estilo_botao2" type="submit" value="ENVIAR COMENTÁRIO" />
														<input class="estilo_botao3" type="reset" value="LIMPAR" />
				</form>	
<?php 
	try {
		$stmt = $conexao->prepare("SELECT CONCAT('Nome: ',NOME) AS NOME, CONCAT('Comentário: ',COMENTARIO) AS COMENTARIO, DATE_FORMAT(DATA, 'em %d/%m/%Y as %H:%i:%S') AS DATA, CONCAT('Administrador: ',RESPOSTA) AS RESPOSTA FROM FEEDBACK ORDER BY DATA;");
			if ($stmt->execute()) {
				while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {    
					echo
					"<div class='feed1'>".
						"<div class='feed2'>".$rs->NOME."</div>".
						"<div class='feed3'>".$rs->DATA."</div>".
						"<div class='feed4'>".$rs->COMENTARIO."</div>".
						"<div class='feed5'>".$rs->RESPOSTA."</div>".
					"</div>";
						}
				} else {
			echo "Nenhum comentário registrado!";
				}
				} catch (PDOException $erro) {
			echo "Erro: ".$erro->getMessage();
		}
?>	
		</div>
		<div class="linha"></div>
	</div>
	<div class="quadrado_final">
		<div class="estilo_final">Copyright © 2021 - Todos os direitos reservados</div>
			<div class="versao">Versão 1.20</div>
				<a href="mailto:kelvin5henri@gmail.com" target="_blank"><div class="container-EMAIL" title="kelvin5henri@gmail"></div></a>
					<a href="https://api.whatsapp.com/send?phone=5511948441622&text=" target="_blank">
						<div class="container-WHATSAPP" title="(11)94844-1622"></div></a>
							<a href="#" target="_blank">
								<div class="container-LINKEDIN" title="linkedin.com/kelvinhenrique"></div></a>
									<div class="estilo4">DEVELOPED BY KELVIN HENRIQUE | FULL STRACK DEVELOPER</div>
	</div>
</body>
</html>