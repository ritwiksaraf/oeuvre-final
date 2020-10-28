

import os
# uses mammoth to extract txt from docx/convert docx to html
import mammoth
# uses docx2txt to extract images
import docx
import zipfile
import datetime
#BeautifulSoup to prettify the html doc
from bs4 import BeautifulSoup as bs
import sqlite3

######################################--Profanity related functions--######################################
# a list of cuss words in hinglish and english
cuss_words = ['aand', 'aandu', 'balatkar', 'beti chod', 'bhadva', 'bhadve', 'bhandve', 'bhootni ke', 'bhosad', 'bhosadi ke', 'boobe', 'chakke', 'chinaal', 'chinki', 'chod',
              'chodu', 'chodu bhagat', 'chooche', 'choochi', 'choot', 'choot ke baal', 'chootia', 'chootiya', 'chuche', 'chuchi', 'chudai khanaa', 'chudan chudai', 'chut',
              'chutad', 'chutadd', 'chutan', 'chutia', 'chutiya', 'gaand', 'gaandfat', 'gaandmasti', 'gaandufad', 'gandu', 'gashti', 'gasti', 'ghassa', 'ghasti', 'harami', 
              'haramzade', 'hawas', 'hijda', 'hijra', 'jhant', 'jhantu', 'kamine', 'kaminey', 'kanjar', 'kutta', 'kamina', 'kuttiya', 'loda', 'lodu', 'lund', 'lundtopi', 
              'lundure', 'maal', 'madarchod', 'mooh mein le', 'mutth', 'najayaz', 'paki', 'raand', 'randi', 'sala', 'saala', 'sali', 'kutti', 'saala', 'saali', 'suar', 
              'tatte', 'tatti', 'teri maa ka', 'bhosada', 'teri maa ki', 'tharak', 'tharki4r5e', '5h1t', '5hit', 'a55', 'anal', 'anus', 'ar5e', 'arrse', 'arse', 'ass',
              'ass-fucker', 'asses', 'assfucker', 'assfukka', 'asshole', 'assholes', 'asswhole', 'a_s_s', 'b!tch', 'b00bs', 'b17ch', 'b1tch', 'ballbag', 'balls', 'ballsack', 
              'bastard', 'beastial', 'beastiality', 'bellend', 'bestial', 'bestiality', 'bi+ch', 'biatch', 'bitch', 'bitcher', 'bitchers', 'bitches', 'bitchin', 'bitching',
              'bloody', 'blow job', 'blowjob', 'blowjobs', 'boiolas', 'bollock', 'bollok', 'boner', 'boob', 'boobs', 'booobs', 'boooobs', 'booooobs', 'booooooobs', 'breasts', 
              'buceta', 'bugger', 'bum', 'bunny fucker', 'butt', 'butthole', 'buttmunch', 'buttplug', 'c0ck', 'c0cksucker', 'carpet muncher', 'cawk', 'chink', 'cipa', 'cl1t', 
              'clit', 'clitoris', 'clits', 'cnut', 'cock', 'cock-sucker', 'cockface', 'cockhead', 'cockmunch', 'cockmuncher', 'cocks', 'cocksuck', 'cocksucked', 'cocksucker', 
              'cocksucking', 'cocksucks', 'cocksuka', 'cocksukka', 'cok', 'cokmuncher', 'coksucka', 'coon', 'cox', 'crap', 'cum', 'cummer', 'cumming', 'cums', 'cumshot',
              'cunilingus', 'cunillingus', 'cunnilingus', 'cunt', 'cuntlick', 'cuntlicker', 'cuntlicking', 'cunts', 'cyalis', 'cyberfuc', 'cyberfuck', 'cyberfucked',
              'cyberfucker', 'cyberfuckers', 'cyberfucking', 'd1ck', 'damn', 'dick', 'dickhead', 'dildo', 'dildos', 'dink', 'dinks', 'dirsa', 'dlck', 'dog-fucker', 'doggin', 
              'dogging', 'donkeyribber', 'doosh', 'duche', 'dyke', 'ejaculate', 'ejaculated', 'ejaculates', 'ejaculating', 'ejaculatings', 'ejaculation', 'ejakulate', 'f u c k',
              'f u c k e r', 'f4nny', 'fag', 'fagging', 'faggitt', 'faggot', 'faggs', 'fagot', 'fagots', 'fags', 'fanny', 'fannyflaps', 'fannyfucker', 'fanyy', 'fatass', 'fcuk',
              'fcuker', 'fcuking', 'feck', 'fecker', 'felching', 'fellate', 'fellatio', 'fingerfuck', 'fingerfucked', 'fingerfucker', 'fingerfuckers', 'fingerfucking', 'fingerfucks', 
              'fistfuck', 'fistfucked', 'fistfucker', 'fistfuckers', 'fistfucking', 'fistfuckings', 'fistfucks', 'flange', 'fook', 'fooker', 'fuck', 'fucka', 'fucked', 'fucker', 
              'fuckers', 'fuckhead', 'fuckheads', 'fuckin', 'fucking', 'fuckings', 'fuckingshitmotherfucker', 'fuckme', 'fucks', 'fuckwhit', 'fuckwit', 'fudge packer', 
              'fudgepacker', 'fuk', 'fuker', 'fukker', 'fukkin', 'fuks', 'fukwhit', 'fukwit', 'fux', 'fux0r', 'f_u_c_k', 'gangbang', 'gangbanged', 'gangbangs', 'gaylord', 
              'gaysex', 'goatse', 'God', 'god-dam', 'god-damned', 'goddamn', 'goddamned', 'hardcoresex', 'hell', 'heshe', 'hoar', 'hoare', 'hoer', 'homo', 'hore', 'horniest', 
              'horny', 'hotsex', 'jack-off', 'jackoff', 'jap', 'jerk-off', 'jism', 'jiz', 'jizm', 'jizz', 'kawk', 'knob', 'knobead', 'knobed', 'knobend', 'knobhead', 'knobjocky', 
              'knobjokey', 'kock', 'kondum', 'kondums', 'kum', 'kummer', 'kumming', 'kums', 'kunilingus', 'l3i+ch', 'l3itch', 'labia', 'lmfao', 'lust', 'lusting', 'm0f0', 'm0fo', 
              'm45terbate', 'ma5terb8', 'ma5terbate', 'masochist', 'master-bate', 'masterb8', 'masterbat*', 'masterbat3', 'masterbate', 'masterbation', 'masterbations', 
              'masturbate', 'mo-fo', 'mof0', 'mofo', 'mothafuck', 'mothafucka', 'mothafuckas', 'mothafuckaz', 'mothafucked', 'mothafucker', 'mothafuckers', 'mothafuckin', 
              'mothafucking', 'mothafuckings', 'mothafucks', 'mother fucker', 'motherfuck', 'motherfucked', 'motherfucker', 'motherfuckers', 'motherfuckin', 'motherfucking', 
              'motherfuckings', 'motherfuckka', 'motherfucks', 'muff', 'mutha', 'muthafecker', 'muthafuckker', 'muther', 'mutherfucker', 'n1gga', 'n1gger', 'nazi', 'nigg3r', 
              'nigg4h', 'nigga', 'niggah', 'niggas', 'niggaz', 'nigger', 'niggers', 'nob', 'nob jokey', 'nobhead', 'nobjocky', 'nobjokey', 'numbnuts', 'nutsack', 'orgasim', 
              'orgasims', 'orgasm', 'orgasms', 'p0rn', 'pawn', 'pecker', 'penis', 'penisfucker', 'phonesex', 'phuck', 'phuk', 'phuked', 'phuking', 'phukked', 'phukking', 
              'phuks', 'phuq', 'pigfucker', 'pimpis', 'piss', 'pissed', 'pisser', 'pissers', 'pisses', 'pissflaps', 'pissin', 'pissing', 'pissoff', 'poop', 'porn', 'porno', 
              'pornography', 'pornos', 'prick', 'pricks', 'pron', 'pube', 'pusse', 'pussi', 'pussies', 'pussy', 'pussys', 'rectum', 'retard', 'rimjaw', 'rimming', 's hit', 
              's.o.b.', 'sadist', 'schlong', 'screwing', 'scroat', 'scrote', 'scrotum', 'semen', 'sex', 'sh!+', 'sh!t', 'sh1t', 'shag', 'shagger', 'shaggin', 'shagging', 
              'shemale', 'shi+', 'shit', 'shitdick', 'shite', 'shited', 'shitey', 'shitfuck', 'shitfull', 'shithead', 'shiting', 'shitings', 'shits', 'shitted', 'shitter', 
              'shitters', 'shitting', 'shittings', 'shitty', 'skank', 'slut', 'sluts', 'smegma', 'smut', 'snatch', 'son-of-a-bitch', 'spac', 'spunk', 's_h_i_t', 't1tt1e5', 
              't1tties', 'teets', 'teez', 'testical', 'testicle', 'tit', 'titfuck', 'tits', 'titt', 'tittie5', 'tittiefucker', 'titties', 'tittyfuck', 'tittywank', 'titwank', 
              'tosser', 'turd', 'tw4t', 'twat', 'twathead', 'twatty', 'twunt', 'twunter', 'v14gra', 'v1gra', 'vagina', 'viagra', 'vulva', 'w00se', 'wang', 'wank', 'wanker', 
              'wanky', 'whoar', 'whore', 'willies', 'willy', 'xrated', '🖕']

#list of found cuss words, gets updated as cuss words are found
found_cuss_words = []

# check_profanity scans the provided file for any cuss words in the list above, returns True if cuss words are found
def check_profanity(docfile):
    #check for file type to extract content to check profanity
    f = open(docfile, "rb")
    name, extension = os.path.splitext(docfile)
    if extension == '.txt':
        f.close()
        f = open(docfile, "r")
        content = f.read()
    elif extension == '.docx':
        result = mammoth.extract_raw_text(f)
        content = result.value
    else:
        exit()
    
    small_content = content[:20] #this is for card text on the web page
    small_content = small_content.replace("\n", " ")
    small_content += "...."

    flag = 'green' # green by default
    for cuss in cuss_words:
        if cuss in content:
            found_cuss_words.append(cuss) # appends found cuss words to the found_cuss_words list
            flag = 'red' # red if cuss words found 
        
    fdetails = name.split("-") #year-month-day-author-tags-title
    year, month, day, author, tags, title = fdetails[0], fdetails[1], fdetails[2], fdetails[3], fdetails[4], fdetails[5].replace(" ","_")
    Date = datetime.date(int(year), int(month), int(day))
    fdetails = [Date, author, tags, small_content, title]
    return (flag, fdetails) # returns flag along with file details

# prints all found cuss words
def show_cuss_words():
    for cuss in found_cuss_words:
        print(cuss)

######################################--End--######################################
####################-functions-#################
def getText(documentfilename):
  with open(documentfilename,"r") as msdoc:
    documentfinal = docx.Document(msdoc)
    fullText = []
    for para in documentfinal.paragraphs:
        fullText.append(para.text)
  return '\n'.join(fullText)
####################-end of functions-##########

######################################--conversion functions--######################################    

#converts docx file to html
def docx2html(docxfile, header, footer):
    
    with open(docxfile, "rb") as docx_file:
        name = os.path.basename(docx_file.name) # gets name of text file
    
        try:
            year, month, day, author, tags, title = name.split('-') # extracts date, author, and title from file name
        except:
            exit()
    html = getText(docx_file)
    date = day+"-"+month+"-"+year
    title = title[:-5] # removes '.docx' from name
    print(year,month,day,author,title,tags)
    parent_dir = "/var/www/html/Includes/posts/images"
    path = os.path.join(parent_dir, title)
    os.mkdir(path) # makes a new dir to store images, for card image
    def imgextractor(docxpath,destinationpath):
      docx=zipfile.ZipFile(docxpath)
      for info in docx.infolist():
          if info.filename.endswith((".png",".jpg",".jpeg",".gif")):
              docx.extract(info.filename, destinationpath)
      docx.close()
    imgextractor(docxfile,"/tmp/")
    os.replace("/tmp/word/media/",f"/var/www/html/Includes/posts/images/{title}/")

    #add css links
    links = '<meta charset="utf-8">'
    links += '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'
    links += '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>'
    links += '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">'
    links += '<link rel="stylesheet" href="/var/www/html/Includes/css/blog.css">'
    links += '<link rel="stylesheet" href="/var/www/html/Includes/css/hdft.css">'
    links += '<link rel="stylesheet" href="/var/www/html/Includes/css/dark-mode.css">'
    links += '<link rel="stylesheet" href="/var/www/html/Includes/css/style.css">'

    links += f'<title>{title}</title>'

    #create a temp file, its gonna be difficult to read
    with open("temp_html", "w+") as html_file:
        html_file.write(f"""<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/Includes/img/small_icon.png" />
  <!-- Bootstrap CSS -->
  <title>Blog | OEUVRE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="/Includes/stylesheets/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/Includes/stylesheets/hdft.css">
  <link rel="stylesheet" href="/Includes/stylesheets/dark-mode.css">
</head>

<body>
  <!---navigation bar------------>
  <div class="footer1 text-center">
    <a href="https://fcrit.ac.in/" id="nameofclg" target="_blank">Fr. C. Rodrigues Institute of Technology, Vashi, Navi
      Mumbai, India</a>
  </div>
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand logold" href="../../Home.html"><img src="/Includes/img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ml-auto">
            <div class="nav-link custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="darkSwitch">
              <label class="custom-control-label" for="darkSwitch"><i class="fa fa-moon-o"></i></label>
            </div>
          </li>
          <li class="nav-item ml-auto">
            <div class="dropdown nav-link ml-auto">
              <button class="dropbtn" href="">ARCHIVES</button>
              <div class="dropdown-content">
                <a href="../../archives-c.html">Creative</a>
                <a href="../../archives-i.html">Informative</a>
              </div>
            </div>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="../../faq.html">F.A.Q.</a>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="../../construction.html">HUMANS OF AGNELS</a>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link" href="../../aboutus.html">ABOUT US</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <!--navigation bar end-->

<br><br><br>
<div class="container-fluid">

  <div class="row">


   <!----------left articles side-start--->

    <div   class="col-lg-9 bg-light">


        <!-----------------title-->
        <h3 class="display-3 text-center" >{title.replace("_"," ")}</h3>
        
     <br><br>

        <div id="imagetitle" class="text-center">
          <img src="/Includes/posts/images/{title}/image1.jpg" class="img-fluid" alt="Responsive image">
        </div>
        <div class="containercontent"> <p class="text-center">
        {html}
        </div>
        <div class="container-fluid1 ">
        <br>
        <section id="authorkanam">
          <h4 class="display-4 text-center" >{author}</h4>
          <h6 class="display-6 text-center" >{date}</h6>
        </section>
          <br>
        </div>
        </div>
 <!--todo right hand side articles-->
      <div class="col-lg-3 sticky ">
        <h3 class="display-4 text-center">Trending Now</h3>
        <div class="container">
          <div class="row text-center">
            <div class="col-sm-12 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href="blog1.html"><img class="card-img-top" src="img/blog1.png" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title">An Inanimate Fable</h5>
                  <p class="card-text">I refuse to write a fable about the beautiful moments...</p>
                  <a href="blog1.html" class="btn">View Article</a>
                </div>
              </div>
            </div>
            <div class="col-sm-12 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href="blog3.html"><img class="card-img-top" src="img/blog3.png" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title">Purpose</h5>
                  <p class="card-text">A sudden urge arises to make meaningful use of the time given to us...</p>
                  <a href="blogs/blog3.html" class="btn">View Article</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center mt-4">
            <div class="col-sm-12 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href="blog4.html"><img class="card-img-top" src="img/blog4.png" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title">IKIGAI Boom</h5>
                  <p class="card-text">Life is nature's gift to beings that makes them sentient...</p>
                  <a href="blog4.html" class="btn">View Article</a>
                </div>
              </div>
            </div>
            <div class="col-sm-12 pb-1 pb-md-0">
              <div class="card shadow bg-primary">
                <a href="blog6.html"><img class="card-img-top" src="img/blog6.png" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title">The Melancholy War</h5>
                  <p class="card-text">Every night I bid the stars goodbye,
                    <br>
                    to blow my scars into the blue dye.....</p>
                  <a id="librarykeliescroll" href="blog6.html" class="btn">View Article</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <!-- todo Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-1 col-md-3 col-xl-3">
          <a href="#"><img class="mx-auto d-block" src="../../Includes/img/mr carter.png" width="250"
              height="250px"></a>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6 class="text-center"><b>About</b></h6>
          <p class="text-center">The official blog of Fr. C. Rodrigues Institute of Technology showcasing the up and
            coming creative talent in the institution. The Website is a showcase to the immense potential of
            engineering students around the world.</p>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6 class="text-center">Sections</h6>
          <ul class="footer-links" style="text-align:center;">
            <li><a href="../archives-c.html#articlescroll">Articles</a></li>
            <li><a href="../archives-c.html#poemscroll">Poems</a></li>
            <li><a href="../archives-c.html#graphicscroll">Graphic Arts</a></li>
            <br>
            <li><a href="../faq.html">FAQ</a></li>
            <li><a href="../archives-i.html#guidancescroll">Senior Guidance</a></li>
            <li><a href="../archives-i.html#tutorialscroll">Tutorials</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
            <a href="https://www.fcrit.ac.in/">FCRIT-Vashi</a>.
          </p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="instagram" href="https://www.instagram.com/oeuvre.fcrit/" target="_blank"><i
                  class="fa fa-instagram"></i></a></li>
            <li><a class="facebook" href="https://www.facebook.com/Oeuvre-114987203566335/" target="_blank"><i
                  class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/oeuvrefcrit" target="_blank"><i
                  class="fa fa-twitter"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!--footer end-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <script src="../../Includes/scripts/dark-mode-switch.min.js"></script>
</body>

</html>


"""
        ) 
    html_file.close()


    #beautify the temp file and create the actual html document
    with open("temp_html", "r") as html_file:
        with open(f"{title}.html", "w+") as pretty_html_file:    
            content = html_file.read()
            soup = bs(content, 'html.parser')
            content = soup.prettify()
            pretty_html_file.write(content)

        pretty_html_file.close()

    #delete the temp file
    os.remove("temp_html")
    #print(f"File converted and saved as {title}.html!")
    html_file.close()

######################################--End--######################################

######################################--Misc functions--######################################

# updatedb fucntion performs all the functions or checking profanity, updating the database
def updatedb(whateverFile): #takes file as an argument
    
    connect = sqlite3.connect("/var/www/html/Database/Master.db")
    cursor = connect.cursor()

    profanity, fdetails = check_profanity(whateverFile) # check txt file for cuss words, returns True if cuss words found and file details regardless
    Date, Author, Title, small_content, tags = fdetails[0], fdetails[1], fdetails[2], fdetails[3], fdetails[4] #gets file details to add into database

    docx2html(whateverFile, "", "") # converts docx to html

    #inserts file details into the database
    cursor.execute(f"INSERT INTO postDetails(Date, Author, Title, profanity, small_content, tags) VALUES('{Date}', '{Author}', '{tags}', '{profanity}', '{small_content}', '{Title}');")
    connect.commit()
    connect.close()

#fileMove moves the files for review/approval at admin panel 
def fileMove():
    connect = sqlite3.connect("/var/www/html/Database/Master.db")
    cursor = connect.cursor()
    cursor.execute("SELECT Title, profanity FROM postDetails")
    result = cursor.fetchall()
    for row in result:
        try:
            name, profanity = row
            os.replace(f"{name}.html", f"/var/www/html/Admin/{profanity}-posts/{name}.html")
        except:
            pass
######################################--End--######################################

