<?php
if (isset($_COOKIE['popup_read'])) {
    // O usuário já marcou como lido, não exibir o popup
    return;
}
?>

<div id="popup" class="popup">
    <div class="popup-content">
        <h2 class="popup-title">Conheça os Passos Essenciais para Ganhar Dinheiro em Jogos Online:</h2>
        <ol class="popup-steps">
            <li id="step1"><b>Passo 1:</b> Primeiro entre em nosso grupo do WHATSAPP
                <a href="https://chat.whatsapp.com/JG3AGHLgkZhAZP54sgWzix" target="_blank">Clique aqui</a> para acessar o grupo.
                Entenda que os seus ganhos nos jogos, como Fortune Tiger, Fortune OX, etc., são baseados na plataforma em que
                você está jogando, na quantidade de rodadas e no horário. Portanto, verifique as orientações das plataformas
                que estão pagando no momento, através do gráfico fornecido pelo sistema. Faça o seu cadastro e defina
                o valor mínimo para fazer a sua aposta.</li>

            <li id="step2" style="display: none;"><b>Passo 2:</b> O sistema PG MINITOR possui um robô que localiza as
                plataformas em alta, que estão pagando bem para os jogadores, assim como os jogos mais
                populares no momento. Esse sistema utiliza inteligência artificial para analisar mais de
                315 plataformas existentes e trazer a melhor oportunidade para você.</li>

            <li id="step3" style="display: none;"><b>Passo 3:</b> Todas as plataformas têm um limite de ganhos e perdas.
                Após meses de estudo, descobrimos que quando uma plataforma atinge o limite de ganhos, ela começa a pagar.
                É nesse momento que nosso robô identifica e traz as melhores oportunidades para você ganhar dinheiro.</li>

            <li id="step4" style="display: none;"><b>Passo 4:</b>Recomendamos que você analise os gráficos de slots, horários
                de jogos pagantes e plataformas com bom desempenho. Essas informações são valiosas para tomar decisões
                informadas e aumentar suas chances de ganhar. Além disso, é aconselhável não realizar mais de 20
                rodadas em uma aposta. Limite-se a um máximo de 20 rodadas e, se não houver pagamento durante esse
                período, encerre o jogo e verifique se o jogo está no horário de maior pagamento.</li>
        </ol>
        <button id="btnNext" class="popup-button">Avançar</button>
        <label>
            <input type="checkbox" id="chkNoShow"> Não exibir novamente
        </label>
    </div>
</div>
<script>
    var currentStep = 1;
    var step1 = document.getElementById("step1");
    var step2 = document.getElementById("step2");
    var step3 = document.getElementById("step3");
    var step4 = document.getElementById("step4");
    var btnNext = document.getElementById("btnNext");
    var chkNoShow = document.getElementById("chkNoShow");

    function showStep(step) {
        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";

        if (step === 1) {
            step1.style.display = "block";
            btnNext.innerText = "Avançar";
        } else if (step === 2) {
            step2.style.display = "block";
            btnNext.innerText = "Avançar";
        } else if (step === 3) {
            step3.style.display = "block";
            btnNext.innerText = "Avançar";
        } else if (step === 4) {
            step4.style.display = "block";
            btnNext.innerText = "Concluir";
        }
    }

    function nextStep() {
        if (currentStep < 4) {
            currentStep++;
            showStep(currentStep);
        } else {
            if (chkNoShow.checked) {
                setCookie('popup_read', '1', 365);
            }
            closePopup();
        }
    }

    btnNext.addEventListener("click", nextStep);

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function closePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }
</script>
<style>
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .popup-content {
        max-width: 400px;
        padding: 2rem;
        text-align: center;
        background-color: #fff;
        border-radius: 0.5rem;
    }

    .popup-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .popup-steps {
        text-align: left;
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .popup-steps li {
        margin-bottom: 0.5rem;
    }

    .popup-button {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #8f0084;
        color: #fff;
        border-radius: 0.5rem;
        font-weight: bold;
        transition: 0.3s;
    }

    .popup-button:hover {
        background-color: #cc0066;
    }
</style>
