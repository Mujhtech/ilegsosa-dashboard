import React, { useEffect } from 'react';
import GuestRoute from './GuestRoute';
import PrivateRoute from './PrivateRoute';

export default function Routes(props) {

    const NewComponent = props.component;

    useEffect(() => {
        document.title = props.title + " - ILEGSOSA";

        return () => {

        }
    }, [props])
    return (
        props.middleware === 'auth' ? <PrivateRoute path={props.path} exact={true}><NewComponent /></PrivateRoute> :
            <GuestRoute path={props.path} exact={true}><NewComponent /></GuestRoute>
    )
}
