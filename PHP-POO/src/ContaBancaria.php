<?php

class ContaBancaria 
{
    private string $nome;
    private string $cpf;
    private string $numeroConta; // String pra receber o número formatado
    private float $saldo;
    private static array $numerosIndisponiveis = []; // Guarda contas já utilizadas
    private static array $contas = []; // Cópia das contas geradas na run

    public function __construct($nome, $cpf)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->numeroConta = self::gerarNumeroConta(); //Gerar n de conta aleatório
        $this->saldo = 0;

        // Passar tudo para o array cópia para poder listar depois
        self::$contas[] = [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'numeroConta' => $this->numeroConta, // Já vem tratado
            'saldo' => $this->saldo
        ];
        echo "------------------------------------------------\n";
        echo "## Conta de número {$this->numeroConta} criada com sucesso ##\n";
        echo "------------------------------------------------\n";
    }

    public function depositar($valor) :void
    {
        // Verifica se valor é válido
        if ($valor < 0){
            echo "Formato inválido. Operação encerrada\n";
            return;
        }

        // Atualizado o saldo do objeto
        $this->saldo += $valor;
        $saldoAtualizado = $this->saldo;

        // Atualiza o array que possui a cópia das contas
        $indice = array_search($this->cpf, array_column(self::$contas, 'cpf'));
        self::$contas[$indice]['saldo'] += $valor;
        
        echo "** Depósito de R$ " 
        . number_format($valor, 2, ',', '.') 
        . " realizado com sucesso na conta nº " . $this->numeroConta. "\n-> Saldo atual: R$ " 
        . number_format($saldoAtualizado, 2, ',', '.')
        . " <-\n";
        echo "------------------------------------------------\n";
        return;
    }

    public function sacar($valor) :void
    {
        // Verifica se valor é válido
        if ($valor < 0){
            echo "Formato inválido. Operação encerrada\n";
            echo "------------------------------------------------\n";
            return;
        }

        // Verifica saldo disponível
        if ($valor > $this->saldo){
            echo "Saldo solicitado: R$ " . number_format($valor, 2, ',', '.') . ". Saldo atual: R$ " . number_format($this->saldo, 2, ',', '.') . ". Operação encerrada\n";
            echo "------------------------------------------------\n";
            return;
        }

        // Atualizado o saldo do objeto
        $this->saldo -= $valor;
        $saldoAtualizado = $this->saldo;

        // Atualiza o array que possui a cópia das contas
        $indice = array_search($this->cpf, array_column(self::$contas, 'cpf'));
        self::$contas[$indice]['saldo'] -= $valor;

        echo "** Saque de R$ " 
        . number_format($valor, 2, ',', '.') 
        . " realizado com sucesso na conta nº " . $this->numeroConta. "\n-> Saldo atual: R$ " 
        . number_format($saldoAtualizado, 2, ',', '.')
        . " <-\n";
        echo "------------------------------------------------\n";
        return;
    }

    public function verificarSaldo() :void
    {
        echo "** Verificar Saldo \n";
        echo "Número da Conta: {$this->numeroConta}\n";
        // Formatação em moeda real
        echo "Saldo:           R$ " . number_format($this->saldo, 2, ',', '.') . "\n"; 
        echo "------------------------------------------------\n";
        return;
    }

    // Daria pra ter feito incrementando, mas queria testar o comportamento com números aleatórios
    private static function gerarNumeroConta() :string
    {
        // Gera números aleatórios de Conta e Dígito e verifica se já existe
        do {
            $numConta = rand(1, 9999);
            $digConta = rand(1, 9);

            // Formatar número conta para ter sempre 5 dígitos (preenchidos com 0 à esquerda) e número verificador
            $numContaFormatado = str_pad($numConta, 5, '0', STR_PAD_LEFT) . "-$digConta";

            // Daqui pra baixo pode ser considerado apenas como log, mas imprimindo pra ver a reação do código
            echo "Verificando disponibilidade de conta nº $numContaFormatado\n";
            echo "------------------------------------------------\n";
            // Primeira verificação dentro da função do while apenas para gerar o primeiro log
            if (in_array($numContaFormatado, self::$numerosIndisponiveis)){
                // Se quise testar a verificação funcionando altere $numConta e $digConta pra rand(1, 2)
                echo "Conta nº $numContaFormatado indisponível. Recalculando...\n";
                echo "------------------------------------------------\n";
            }
        } while (in_array($numContaFormatado, self::$numerosIndisponiveis)); // Verificação em loop

        // Se saiu do loop, significa que retornou false da função while, logo o novo número gerado para a conta está disponível
        echo "Conta nº $numContaFormatado disponível\n";

        // Joga o número gerado para o array de de contas indisponíveis;
        self::$numerosIndisponiveis[] = $numContaFormatado;
        return $numContaFormatado;
    }

    // Usa a cópia dos objetos do array $contas
    public static function listarTodasAsContas() :void
    {
        echo "################ Lista de Contas ###############\n";
        foreach(self::$contas as $conta){
            echo "------------------------------------------------\n";
            echo "Número da Conta: {$conta['numeroConta']}\n";
            echo "Nome:            {$conta['nome']}\n";
            // Possível formatar com REGEX ****
            echo "CPF:             {$conta['cpf']}\n"; 
            // Formatação em moeda real
            echo "Saldo:           R$ " . number_format($conta['saldo'], 2, ',', '.') . "\n"; 
        }
        echo "------------------------------------------------\n";
        echo "################################################\n";
        return;
    }
}