<?php
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [
        [
            'id' => 1,
            'texto' => 'Estudar para a prova de matemática',
            'status' => 'Pendente'
        ],
        [
            'id' => 2,
            'texto' => 'Fazer compras no supermercado',
            'status' => 'Concluída'
        ],
        [
            'id' => 3,
            'texto' => 'Agendar consulta médica',
            'status' => 'Pendente'
        ],
        [
            'id' => 4,
            'texto' => 'Pagar conta de luz',
            'status' => 'Concluída'
        ],
        [
            'id' => 5,
            'texto' => 'Preparar apresentação de trabalho',
            'status' => 'Pendente'
        ]
    ];
    $_SESSION['ultimo_id'] = 5;
}

// Processar adição de nova tarefa
if (isset($_POST['adicionar']) && !empty($_POST['texto'])) {
    $_SESSION['ultimo_id']++;
    $_SESSION['tarefas'][] = [
        'id' => $_SESSION['ultimo_id'],
        'texto' => $_POST['texto'],
        'status' => 'Pendente'
    ];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Processar exclusão de tarefa
if (isset($_GET['excluir']) && is_numeric($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];
    foreach ($_SESSION['tarefas'] as $key => $tarefa) {
        if ($tarefa['id'] == $id) {
            unset($_SESSION['tarefas'][$key]);
            break;
        }
    }
    $_SESSION['tarefas'] = array_values($_SESSION['tarefas']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Alternar status da tarefa
if (isset($_GET['alternar']) && is_numeric($_GET['alternar'])) {
    $id = (int)$_GET['alternar'];
    foreach ($_SESSION['tarefas'] as $key => $tarefa) {
        if ($tarefa['id'] == $id) {
            $_SESSION['tarefas'][$key]['status'] = 
                ($_SESSION['tarefas'][$key]['status'] === 'Pendente') ? 'Concluída' : 'Pendente';
            break;
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Limpar todas as tarefas
if (isset($_GET['limpar'])) {
    $_SESSION['tarefas'] = [];
    $_SESSION['ultimo_id'] = 0;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --gray-text: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--dark-text);
            min-height: 100vh;
            padding: 2rem;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--success-color));
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
            font-size: 2.5rem;
        }

        .form-add {
            display: flex;
            margin-bottom: 2rem;
            gap: 10px;
        }

        .form-add input[type="text"] {
            flex-grow: 1;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            outline: none;
        }

        .form-add input[type="text"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.25);
        }

        .form-add button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .form-add button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .tarefas-lista {
            list-style: none;
            padding: 0;
        }

        .tarefa {
            background-color: white;
            border-radius: var(--border-radius);
            margin-bottom: 1rem;
            padding: 1rem 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .tarefa:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .tarefa-pendente {
            border-left-color: var(--primary-color);
        }

        .tarefa-concluida {
            border-left-color: var(--success-color);
        }

        .tarefa-concluida .tarefa-texto {
            text-decoration: line-through;
            color: var(--gray-text);
        }

        .tarefa-texto {
            flex-grow: 1;
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .status {
            padding: 0.4rem 0.75rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
            letter-spacing: 0.5px;
        }

        .status-pendente {
            background-color: rgba(67, 97, 238, 0.15);
            color: var(--primary-color);
        }

        .status-pendente:hover {
            background-color: rgba(67, 97, 238, 0.25);
        }

        .status-concluida {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success-color);
        }

        .status-concluida:hover {
            background-color: rgba(76, 201, 240, 0.25);
        }

        .btn-excluir {
            color: var(--warning-color);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: var(--transition);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .btn-excluir:hover {
            background-color: rgba(247, 37, 133, 0.1);
            transform: rotate(15deg);
        }

        .contador {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            gap: 20px;
        }

        .contador-item {
            text-align: center;
            padding: 0.6rem 1.2rem;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            min-width: 110px;
        }

        .contador-numero {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .contador-total .contador-numero {
            color: var(--dark-text);
        }

        .contador-pendentes .contador-numero {
            color: var(--primary-color);
        }

        .contador-concluidas .contador-numero {
            color: var(--success-color);
        }

        .contador-label {
            font-size: 0.85rem;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .limpar-todas {
            text-align: center;
            margin-top: 1.5rem;
        }

        .btn-limpar {
            background: none;
            border: none;
            color: var(--warning-color);
            text-decoration: none;
            font-size: 0.95rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-limpar:hover {
            background-color: rgba(247, 37, 133, 0.1);
        }

        .sem-tarefas {
            text-align: center;
            color: var(--gray-text);
            margin: 3rem 0;
            font-style: italic;
            font-size: 1.1rem;
        }

        a {
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--gray-text);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .container {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .contador {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .contador-item {
                width: 100%;
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Minhas Tarefas</h1>
        
        <!-- Formulário para adicionar novas tarefas -->
        <form method="post" class="form-add">
            <input type="text" name="texto" placeholder="O que você precisa fazer?" required>
            <button type="submit" name="adicionar">
                <i class="fas fa-plus"></i> Adicionar
            </button>
        </form>
        
        <?php if (empty($_SESSION['tarefas'])): ?>
            <p class="sem-tarefas">Sua lista de tarefas está vazia. Adicione uma nova tarefa!</p>
        <?php else: ?>
            <ul class="tarefas-lista">
                <?php foreach ($_SESSION['tarefas'] as $tarefa): 
                    $estilo_tarefa = $tarefa['status'] === 'Pendente' ? 'tarefa-pendente' : 'tarefa-concluida';
                ?>
                    <li class="tarefa <?php echo $estilo_tarefa; ?>">
                        <div class="tarefa-texto">
                            <?php echo htmlspecialchars($tarefa['texto']); ?>
                        </div>
                        <div class="acoes">
                            <a href="?alternar=<?php echo $tarefa['id']; ?>">
                                <div class="status <?php echo strtolower($tarefa['status']) === 'pendente' ? 'status-pendente' : 'status-concluida'; ?>">
                                    <?php echo htmlspecialchars($tarefa['status']); ?>
                                </div>
                            </a>
                            <a href="?excluir=<?php echo $tarefa['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <!-- Estatísticas das tarefas -->
            <div class="contador">
                <div class="contador-item contador-total">
                    <div class="contador-numero"><?php echo count($_SESSION['tarefas']); ?></div>
                    <div class="contador-label">Total</div>
                </div>
                
                <div class="contador-item contador-pendentes">
                    <div class="contador-numero">
                        <?php echo count(array_filter($_SESSION['tarefas'], function($t) { return $t['status'] === 'Pendente'; })); ?>
                    </div>
                    <div class="contador-label">Pendentes</div>
                </div>
                
                <div class="contador-item contador-concluidas">
                    <div class="contador-numero">
                        <?php echo count(array_filter($_SESSION['tarefas'], function($t) { return $t['status'] === 'Concluída'; })); ?>
                    </div>
                    <div class="contador-label">Concluídas</div>
                </div>
            </div>
            
            <div class="limpar-todas">
                <a href="?limpar=1" class="btn-limpar" onclick="return confirm('Tem certeza que deseja excluir TODAS as tarefas?')">
                    <i class="fas fa-trash-alt"></i> Limpar todas as tarefas
                </a>
            </div>
        <?php endif; ?>
        
        <div class="footer">
            &copy; <?php echo date('Y'); ?> Lista de Tarefas
        </div>
    </div>
</body>
</html>