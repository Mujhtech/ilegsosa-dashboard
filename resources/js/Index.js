import React from "react";
import { BrowserRouter as Router, Switch } from "react-router-dom";
import Routes from "./components/Routes";
import { Fragment } from "react";
import Login from "./pages/auth/Login";
import Register from "./pages/auth/Register";
import Home from "./pages/Home";
import NoMatch from "./pages/NoMatch";
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Due from "./pages/Due";
import Connect from "./pages/Connect";
import Vote from "./pages/election/Vote";
import DiscussionIndex from "./pages/discussion/Index";
import Announcement from "./pages/Announcement";
import DiscussionCreate from "./pages/discussion/Create";

function App() {
    return (
        <Router>
            <Fragment>
                <Switch>
                    <Routes path="/" title="Dashboard" middleware="auth" exact component={Home} />
                    <Routes path="/announcements" title="Announcement" middleware="auth" exact component={Announcement} />
                    <Routes path="/discussion-thread" title="Discussion Thread" middleware="auth" exact component={DiscussionIndex} />
                    <Routes path="/create-discussion-thread" title="Create Discussion Thread" middleware="auth" exact component={DiscussionCreate} />
                    <Routes path="/pay-due" title="Pay due" middleware="auth" exact component={Due} />
                    <Routes path="/vote" title="Cast Vote" middleware="auth" exact component={Vote} />
                    <Routes path="/connect-with-mates" title="Connect with mates" middleware="auth" exact component={Connect} />
                    <Routes path="/profile" title="Profile" middleware="auth" exact component={Connect} />
                    <Routes path="/auth/login" title="Login" middleware="guest" exact component={Login} />
                    <Routes path="/auth/register" title="Register" middleware="guest" exact component={Register} />
                    <Routes path="*" title="Page Not Found" exact component={NoMatch} />
                </Switch>
                <ToastContainer />
            </Fragment>
        </Router>
    );
}

export default App;
