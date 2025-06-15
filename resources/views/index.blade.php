<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gym Coach - Expert System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #213555 0%, #3E5879 50%, #D8C4B6 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: #F5EFE7;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            color: #D8C4B6;
        }

        .progress-container {
            background: rgba(33, 53, 85, 0.3);
            border-radius: 20px;
            padding: 10px;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(216, 196, 182, 0.2);
        }

        .progress-bar {
            height: 10px;
            background: linear-gradient(90deg, #3E5879, #213555);
            border-radius: 10px;
            transition: width 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(245, 239, 231, 0.4), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .progress-text {
            text-align: center;
            color: #F5EFE7;
            margin-top: 10px;
            font-weight: 500;
        }

        .question-card {
            background: rgba(245, 239, 231, 0.95);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 20px;
            box-shadow: 0 20px 40px rgba(33, 53, 85, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(216, 196, 182, 0.3);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.6s ease forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .question-number {
            display: inline-block;
            background: linear-gradient(135deg, #213555, #3E5879);
            color: #F5EFE7;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-weight: bold;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(33, 53, 85, 0.3);
        }

        .question-text {
            font-size: 1.3rem;
            color: #213555;
            margin-bottom: 30px;
            line-height: 1.6;
            font-weight: 500;
        }

        .options-container {
            display: grid;
            gap: 15px;
        }

        .option-item {
            position: relative;
        }

        .option-input {
            display: none;
        }

        .option-label {
            display: block;
            padding: 20px 25px;
            background: #F5EFE7;
            border: 2px solid #D8C4B6;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            color: #213555;
            position: relative;
            overflow: hidden;
        }

        .option-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(62, 88, 121, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .option-label:hover {
            border-color: #3E5879;
            background: rgba(216, 196, 182, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(62, 88, 121, 0.2);
        }

        .option-label:hover::before {
            left: 100%;
        }

        .option-input:checked + .option-label {
            background: linear-gradient(135deg, #213555, #3E5879);
            border-color: #3E5879;
            color: #F5EFE7;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(33, 53, 85, 0.3);
        }

        .option-label .check-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .option-input:checked + .option-label .check-icon {
            opacity: 1;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            gap: 15px;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(245, 239, 231, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #213555, #3E5879);
            color: #F5EFE7;
            box-shadow: 0 5px 15px rgba(33, 53, 85, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(33, 53, 85, 0.4);
        }

        .btn-secondary {
            background: rgba(245, 239, 231, 0.9);
            color: #213555;
            border: 2px solid #3E5879;
        }

        .btn-secondary:hover {
            background: #3E5879;
            color: #F5EFE7;
            transform: translateY(-2px);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-icon {
            position: absolute;
            font-size: 2rem;
            color: rgba(216, 196, 182, 0.2);
            animation: float 6s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
        .floating-icon:nth-child(2) { top: 20%; right: 15%; animation-delay: 1s; }
        .floating-icon:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 2s; }
        .floating-icon:nth-child(4) { top: 60%; right: 25%; animation-delay: 3s; }
        .floating-icon:nth-child(5) { bottom: 30%; right: 10%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .question-card {
                padding: 25px;
            }

            .question-text {
                font-size: 1.1rem;
            }

            .option-label {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .navigation-buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        } 
    </style>
</head>
<body>
    <div class="floating-elements">
        <i class="fas fa-dumbbell floating-icon"></i>
        <i class="fas fa-running floating-icon"></i>
        <i class="fas fa-heartbeat floating-icon"></i>
        <i class="fas fa-bicycle floating-icon"></i>
        <i class="fas fa-swimmer floating-icon"></i>
    </div>

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-dumbbell"></i> My Gym Coach</h1>
            <p>Expert System untuk Rekomendasi Latihan Personal</p>
        </div>

        <div class="progress-container">
            <div class="progress-bar" id="progressBar" style="width: 33%"></div>
            <div class="progress-text">
                <span id="currentQuestion">1</span> dari <span id="totalQuestions">3</span> pertanyaan
            </div>
        </div>

        <form id="expertSystemForm" action="{{ route('output') }}" method="GET">
            @csrf
            <div id="questionsContainer">
                @forEach($questions as $key => $question)
                <div class="question-card" data-question="{{$key + 1}}" @if($key + 1 !== 1) style="display: none;" @endif>
                    <div class="question-number">{{$key + 1}}</div>
                    <div class="question-text">{{$question->question}}</div>
                    <div class="options-container">
                        @forEach($question->options as $option)
                        <div class="option-item">
                            <input type="radio" id="option_{{$option->id}}" name="question_{{$key + 1}}" value="{{$option->id}}" class="option-input">
                            <label for="option_{{$option->id}}" class="option-label">
                                {{$option->label}}
                                <i class="fas fa-check check-icon"></i>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforEach

            <div class="navigation-buttons">
                <button type="button" id="prevBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-chevron-left"></i> Sebelumnya
                </button>
                <button type="button" id="nextBtn" class="btn btn-primary" disabled>
                    Selanjutnya <i class="fas fa-chevron-right"></i>
                </button>
                <button type="button" id="submitBtn" class="btn btn-primary" style="display: none;">
                    <i class="fas fa-rocket"></i> Dapatkan Rekomendasi
                </button>
            </div>
        </form>
    </div>

    <script>
        class ExpertSystemNavigation {
            constructor() {
                this.currentQuestion = 1;
                this.totalQuestions = {{ count($questions) }};
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.updateUI();
            }

            setupEventListeners() {
                // Next button
                document.getElementById('nextBtn').addEventListener('click', () => {
                    this.nextQuestion();
                });

                // Previous button
                document.getElementById('prevBtn').addEventListener('click', () => {
                    this.prevQuestion();
                });

                document.getElementById('submitBtn').addEventListener('click', () => {
                    const inputs  =  document.querySelectorAll('.option-input');
                    const selectedInputs = Array.from(inputs).filter(input => input.checked);
                    const encrypted = btoa(JSON.stringify(selectedInputs.map(input => input.value)));
                    window.location.href = '/output?o=' + encrypted;
                });

                // Radio button changes
                document.querySelectorAll('.option-input').forEach(input => {
                    input.addEventListener('change', () => {
                        this.updateNextButton();
                        this.addSelectionAnimation(input);
                        this.updateUI();
                    });
                });
            }

            addSelectionAnimation(input) {
                const label = input.nextElementSibling;
                label.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    label.style.transform = 'translateY(-2px)';
                }, 100);
            }

            nextQuestion() {
                if (this.currentQuestion < this.totalQuestions) {
                    // Hide current question
                    const current = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                    current.style.animation = 'slideUp 0.3s ease reverse';
                    
                    setTimeout(() => {
                        current.style.display = 'none';
                        this.currentQuestion++;
                        
                        // Show next question
                        const next = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                        next.style.display = 'block';
                        next.style.animation = 'slideUp 0.6s ease forwards';
                        
                        this.updateUI();
                    }, 300);
                }
            }

            prevQuestion() {
                if (this.currentQuestion > 1) {
                    // Hide current question
                    const current = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                    current.style.animation = 'slideUp 0.3s ease reverse';
                    
                    setTimeout(() => {
                        current.style.display = 'none';
                        this.currentQuestion--;
                        
                        // Show previous question
                        const prev = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                        prev.style.display = 'block';
                        prev.style.animation = 'slideUp 0.6s ease forwards';
                        
                        this.updateUI();
                    }, 300);
                }
            }

            updateUI() {
                // Update progress bar
                const progress = (this.currentQuestion / this.totalQuestions) * 100;
                document.getElementById('progressBar').style.width = `${progress}%`;
                
                // Update progress text
                document.getElementById('currentQuestion').textContent = this.currentQuestion;
                document.getElementById('totalQuestions').textContent = this.totalQuestions;

                // Update buttons
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const submitBtn = document.getElementById('submitBtn');

                // Previous button
                if (this.currentQuestion === 1) {
                    prevBtn.style.display = 'none';
                } else {
                    prevBtn.style.display = 'inline-flex';
                }

                // Next/Submit button
                if (this.currentQuestion === this.totalQuestions) {
                    nextBtn.style.display = 'none';
                    submitBtn.style.display = 'inline-flex';
                    this.updateSubmitButton();
                } else {
                    nextBtn.style.display = 'inline-flex';
                    submitBtn.style.display = 'none';
                    this.updateNextButton();
                }
            }

            updateNextButton() {
                const nextBtn = document.getElementById('nextBtn');
                const currentQuestionInputs = document.querySelectorAll(`input[name="question_${this.currentQuestion}"]`);
                const isAnswered = Array.from(currentQuestionInputs).some(input => input.checked);
                
                nextBtn.disabled = !isAnswered;
            }

            updateSubmitButton() {
                const submitBtn = document.getElementById('submitBtn');
                const currentQuestionInputs = document.querySelectorAll(`input[name="question_${this.currentQuestion}"]`);
                const isAnswered = Array.from(currentQuestionInputs).some(input => input.checked);
                
                submitBtn.disabled = !isAnswered;
            }
        }

        // Initialize the expert system navigation
        document.addEventListener('DOMContentLoaded', () => {
            new ExpertSystemNavigation();
        });

        // Add some interactive effects
        document.querySelectorAll('.option-label').forEach(label => {
            label.addEventListener('mouseenter', function() {
                if (!this.previousElementSibling.checked) {
                    this.style.transform = 'translateY(-2px) scale(1.02)';
                }
            });

            label.addEventListener('mouseleave', function() {
                if (!this.previousElementSibling.checked) {
                    this.style.transform = 'translateY(0) scale(1)';
                }
            });
        });
    </script>
</body>
</html>