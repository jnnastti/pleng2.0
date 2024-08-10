<section>
    <h2>Tempo e clima</h2>
    <p> 
        Informe o dia que foi efetuado o diário de obra e a condição climatica de cada dia da semana. 
        Caso não saiba, deixe em branco.
    </p>
    
    <!-- Segunda -->
    <div class="fieldtempo">
        <label class="grid-3"> Segunda de manhã: </label>
        
        <label>
            <input 
                type="radio" 
                name="temsegmanha" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temsegmanha'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegmanha" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temsegmanha'] == 'chuva') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegmanha" 
                value="sol" 
                <?php
                    if($infosPrevisao['temsegmanha'] == 'sol') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegmanha" 
                value="vento" 
                <?php
                    if($infosPrevisao['temsegmanha'] == 'vento') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <div class="fieldtempo">
        <label class="grid-3"> Segunda de tarde: </label>
        
        <label>
            <input 
                type="radio" 
                name="temsegtarde" 
                value="nublado"
                <?php
                    if($infosPrevisao['temsegtarde'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegtarde" 
                value="chuva"
                <?php
                    if($infosPrevisao['temsegtarde'] == 'chuva') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegtarde" 
                value="sol"
                <?php
                    if($infosPrevisao['temsegtarde'] == 'sol') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsegtarde" 
                value="vento"
                <?php
                    if($infosPrevisao['temsegtarde'] == 'vento') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <hr/>
    <!-- terça -->
    <div class="fieldtempo">
        <label class="grid-3"> Terça de manhã: </label>
        
        <label>
            <input 
                type="radio" 
                name="temtermanha" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temtermanha'] == 'nublado') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtermanha" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temtermanha'] == 'chuva') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtermanha" 
                value="sol" 
                <?php
                    if($infosPrevisao['temtermanha'] == 'sol') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtermanha" 
                value="vento" 
                <?php
                    if($infosPrevisao['temtermanha'] == 'vento') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <div class="fieldtempo">
        <label class="grid-3"> Terça de tarde: </label>
        
        <label>
            <input 
                type="radio" 
                name="temtertarde" 
                value="nublado" checked 
                <?php
                    if($infosPrevisao['temtertarde'] == 'nublado') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtertarde" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temtertarde'] == 'chuva') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtertarde" 
                value="sol" 
                <?php
                    if($infosPrevisao['temtertarde'] == 'sol') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temtertarde" 
                value="vento" 
                <?php
                    if($infosPrevisao['temtertarde'] == 'vento') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <hr/>

    <!-- Quarta -->
    <div class="fieldtempo">
        <label class="grid-3"> Quarta de manhã: </label>
        
        <label>
            <input 
                type="radio" 
                name="temquamanha" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temquamanha'] == 'nublado') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquamanha" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temquamanha'] == 'chuva') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquamanha" 
                value="sol" 
                <?php
                    if($infosPrevisao['temquamanha'] == 'sol') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquamanha" 
                value="vento" 
                <?php
                    if($infosPrevisao['temquamanha'] == 'vento') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <div class="fieldtempo">
        <label class="grid-3"> Quarta de tarde: </label>
        
        <label>
            <input 
                type="radio" 
                name="temquatarde" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temquatarde'] == 'nublado') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquatarde" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temquatarde'] == 'chuva') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquatarde" 
                value="sol" 
                <?php
                    if($infosPrevisao['temquatarde'] == 'sol') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquatarde" 
                value="vento" 
                <?php
                    if($infosPrevisao['temquatarde'] == 'vento') {
                        echo "checked";
                    } 
                ?> 
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <hr/>

    <!-- Quinta -->
    <div class="fieldtempo">
        <label class="grid-3"> Quinta de manhã: </label>
        
        <label>
            <input 
                type="radio" 
                name="temquimanha" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temquimanha'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquimanha" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temquimanha'] == 'chuva') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquimanha" 
                value="sol" 
                <?php
                    if($infosPrevisao['temquimanha'] == 'sol') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquimanha" 
                value="vento" 
                <?php
                    if($infosPrevisao['temquimanha'] == 'vento') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <div class="fieldtempo">
        <label class="grid-3"> Quinta de tarde: </label>
        
        <label>
            <input 
                type="radio" 
                name="temquitarde" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temquitarde'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquitarde" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temquitarde'] == 'chuva') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquitarde" 
                value="sol" 
                <?php
                    if($infosPrevisao['temquitarde'] == 'sol') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temquitarde" 
                value="vento" 
                <?php
                    if($infosPrevisao['temquitarde'] == 'vento') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <hr/>

    <!-- Sexta -->
    <div class="fieldtempo">
        <label class="grid-3"> Sexta de manhã: </label>
        
        <label>
            <input 
                type="radio" 
                name="temsexmanha" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temsexmanha'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsexmanha" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temsexmanha'] == 'chuva') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsexmanha" 
                value="sol" 
                <?php
                    if($infosPrevisao['temsexmanha'] == 'sol') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsexmanha" 
                value="vento" 
                <?php
                    if($infosPrevisao['temsexmanha'] == 'vento') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
    <div class="fieldtempo">
        <label class="grid-3"> Sexta de tarde: </label>
        
        <label>
            <input 
                type="radio" 
                name="temsextarde" 
                value="nublado" 
                <?php
                    if($infosPrevisao['temsextarde'] == 'nublado') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2 small-cloud"></div>
                    <div class="cloud2"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsextarde" 
                value="chuva" 
                <?php
                    if($infosPrevisao['temsextarde'] == 'chuva') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="cloud2"></div>
                    <div class="rain"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsextarde" 
                value="sol" 
                <?php
                    if($infosPrevisao['temsextarde'] == 'sol') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="rays">
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                        <div class="ray"></div>
                    </div>
                    <div class="sun"></div>
                </div>
            </span>
        </label>

        <label>
            <input 
                type="radio" 
                name="temsextarde" 
                value="vento" 
                <?php
                    if($infosPrevisao['temsextarde'] == 'vento') {
                        echo "checked";
                    } 
                ?>
            />
            <span>
                <div class="icon">
                    <div class="extreme text-center">
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                        <div class="harsh-wind"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
</section>