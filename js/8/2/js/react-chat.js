var ChatHeader = React.createClass({
 // Load the initial name
  getInitialState: function() {
    return {name: '', user: {}};
  }, 
  // Get's the user from the server and set's the state,
  // so that it re-renders the ChatHeader
  getUser: function() {
 	    // KOODAA TAHAN
    $.ajax({
		url: 'ajax/get_user.php',
		cache: false,
		datatype: 'json',
		success: function(data) {
			console.log(data[0].name);
			this.setState({name: data[0].name});  
		}.bind(this),
	  
		error: function(xhr, status, err) {
			console.log('boo_error', status, err.toString());  
		}
    });
  },
 // componentDidMount: "If you need to load data from a remote endpoint, this is a good"
 // "place to instantiate the network request. Setting state in this method will trigger a re-rendering."

  componentDidMount: function() {
    // get the user
    // KOODAA TAHAN
    // set the poll interval
    // KOODAA TAHAN
    this.getUser();
	setInterval(this.getUser, 3000);
  },
  render: function() {
    // To display the username   
    return (
      <div className="msg-header">
        Role: <span>{this.state.name}</span>
      </div>
    );
  }
});


var Row = React.createClass({
  render: function() {
    return (
      <div className="msg-row-container">
        <div className="msg-row">
          <span className="user-label">
            <span className="msg-time">{this.props.time}</span> : <span className="chat-username">{this.props.username}</span>
          </span><br/>
          {this.props.message}
        </div>
      </div>
    );
  }
});


var Messages = React.createClass({
  render: function() {
    // inline styles Reactissa, KÃ„YTÃ„ JOS TARVIT
    var inlineStyles = {
      //height: '300px',
      //overflowY: 'scroll'
    };
  
    // Loop through the list of chats and create array of Row components
    // KOODAA TAHAN
    var Rows = this.props.datas.map (function(data, index) {
       return (
          <Row key={index} username={data.username} time={data.time} message={data.message}/>                            
        )
    });
    //    <Row  />
    
	//var Rowsinit = '<div>KORJAA TAMA</div>';

    return (
      <div style={inlineStyles}>
        {Rows}
      </div>
    );
  }
});



var ChatForm = React.createClass({
  // Message send event handler
  handleUserMessage: function(event) {
    // When shift and enter key is pressed
    if (event.shiftKey && event.keyCode === 13) {
      // OTA TEXTAREAN ARVO msg-muuttujaan.
      var msg = this.refs.textArea.value;
      if (msg !== '') {
        // call the sendmessages of ChatContainer throught the props
        // KOODAA CAALBACK TÃHÃN
        this.props.sendMessage(msg);
      }
      // Prevent default and clear the textarea
      event.preventDefault();
      // KOODAA TÃ„HÃ„N TEXTAREA NULLIKSI
      this.refs.textArea.value = null;
    }
  },
  
  render: function() {
    return (
      <div className="msg-input">
        <textarea rows="3" rowsid="chatMsg" ref="textArea" onKeyDown={this.handleUserMessage} placeholder="Type your message. Press shift + Enter to send" />
      </div>
    );
  }
});


var ChatContainer = React.createClass({
  // Load the initial chats
  getInitialState: function() {
    return {datas: []};
  },
  
  // get's messages from server AND set's the state,
  // so that it re-renders the Messages
  getMessages: function() {
  // AJAXILLA
  
  $.ajax({
      url: 'ajax/get_messages.php',
      cache: false,
      dataType: 'json',
      success: function(data) {
          this.setState({datas: data});
      }.bind(this),
      error: function(xhr, status, err) {
          console.log('boo: ', status, err.toString());
      }
  });
      
      
      
  },
  
  // add a new message AND update the messages list
  sendMessage: function(message) {
  // AJAXILLA
      
    $.ajax({
      url: 'ajax/add_msg.php',
      method: 'post',
      cache: false,
      dataType: 'json',
      data: {msg: message},
      success: function(data) {
          this.setState({datas: data});
      }.bind(this),
      error: function(xhr, status, err) {
          console.log('boo: ', status, err.toString());
      }
  });
      
      
  },
  
  componentDidMount: function() {
     this.getMessages();
     setInterval(this.getMessages, 2000);
     // PITÃ„ISI HAKEA TÃ„SSÃ„ KAIKKI VIESTIT KUN UUSI ON LÃ„HETETTY
     // JA LÃ„HETTÃ„Ã„ PYYNTÃ– uudelleen 5 sec vÃ¤lein
    
  },
  
  render: function() {
    return (
      <div className="chat-container">
        <ChatHeader />
        <ChatForm sendMessage={this.sendMessage} />
        <Messages datas={this.state.datas} />
      </div>
    );
  }
});

ReactDOM.render(
  <ChatContainer />,
  document.getElementById('container')
);