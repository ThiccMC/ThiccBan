export default function SearchBar({ children }) {
    return (
        <div style={{marginBottom: '20px'}}>
            <form action="/result" method="GET">
            <input className="d-inline-block" name="player" minLength="3" maxLength="16" type="text" id="p-search-inp-list" style={{paddingTop: '5px', paddingBottom: '8px', paddingRight: '4px', paddingLeft: '12px', fontSize: '14px', borderWidth: '0px'}} placeholder="Search player" />
            <button className="btn btn-primary" type="submit" role="button" id="p-search-sub-list" href="#" style={{padding: '0px', paddingBottom: '4px', paddingRight: '0px', paddingLeft: '0px', paddingTop: '4px', marginTop: '0px'}}><i className="fas fa-search" /></button>
            </form>
        </div>
    );
}